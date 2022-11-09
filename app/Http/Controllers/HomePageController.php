<?php

namespace App\Http\Controllers;

use App\Models\Produk; 
use App\Models\Kategori;
use App\Models\Wishlist;
use App\Models\Slideshow;
use App\Models\ProdukPromo;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        $itemproduk = Produk::orderBy('created_at', 'desc')->limit(5)->get();
        $itempromo = ProdukPromo::orderBy('created_at', 'desc')->limit(5)->get();
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->limit(6)->get();
        $itemslide = Slideshow::get();
        $pesan = ChMessage::where('to_id', $user->id)->get();
        $pesanCount = count($pesan);
        $data = array('title' => 'Homepage',
            'itemproduk' => $itemproduk,
            'itempromo' => $itempromo,
            'itemkategori' => $itemkategori,
            'itemslide' => $itemslide,
            'pesanCount' => $pesanCount
        );
        return view('homepage.index', $data);
    }

    public function about() {
        $data = array('title' => 'Tentang Kami');
        return view('homepage.about', $data);
    }

    public function kontak() {
        $data = array('title' => 'Kontak Kami');
        return view('homepage.kontak', $data);
    }

    public function kategori() 
    {
        $itemproduk = Produk::orderBy('created_at', 'desc')->get();
        $itempromo = ProdukPromo::orderBy('created_at', 'desc')->get();
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        $itemslide = Slideshow::get();
        $data = array('title' => 'Homepage',
            'itemproduk' => $itemproduk,
            'itempromo' => $itempromo,
            'itemkategori' => $itemkategori,
        );
        return view('homepage.kategori', $data);
    }

    public function kategoribyslug(Request $request, $slug) 
    {
        $itemproduk = Produk::orderBy('nama_produk', 'desc')
                            ->where('status', 'publish')
                            ->whereHas('kategori', function($q) use ($slug) {
                                $q->where('slug_kategori', $slug);
                            })
                            ->paginate(18);
        $listkategori = Kategori::orderBy('nama_kategori', 'asc')
                                ->where('status', 'publish')
                                ->get();
        $itemkategori = Kategori::where('slug_kategori', $slug)
                                ->where('status', 'publish')
                                ->first();
        if ($itemkategori) {
            $data = array('title' => $itemkategori->nama_kategori,
                        'itemproduk' => $itemproduk,
                        'listkategori' => $listkategori,
                        'itemkategori' => $itemkategori);
            return view('homepage.produk', $data)->with('no', ($request->input('page') - 1) * 18);            
        } else {
            return abort('404');
        }
    }

    public function produk(Request $request) 
    {
        $itemproduk = Produk::orderBy('nama_produk', 'desc')
                            ->where('status', 'publish')
                            ->paginate(18);
        $listkategori = Kategori::orderBy('nama_kategori', 'asc')
                                ->where('status', 'publish')
                                ->get();
        $data = array('title' => 'Produk',
                    'itemproduk' => $itemproduk,
                    'listkategori' => $listkategori);
        return view('homepage.produk', $data);
    }

    public function produkdetail($id) 
    {
        $itemproduk = Produk::where('slug_produk', $id)
                            ->where('status', 'publish')
                            ->first();
        if ($itemproduk) {
            if (Auth::user()) {//cek kalo user login
                $itemuser = Auth::user();
                $itemwishlist = Wishlist::where('produk_id', $itemproduk->id)
                                        ->where('user_id', $itemuser->id)
                                        ->first();
                $data = array('title' => $itemproduk->nama_produk,
                        'itemproduk' => $itemproduk,
                        'itemwishlist' => $itemwishlist);
            } else {
                $data = array('title' => $itemproduk->nama_produk,
                            'itemproduk' => $itemproduk);
            }
            return view('homepage.produkdetail', $data);            
        } else {
            // kalo produk ga ada, jadinya tampil halaman tidak ditemukan (error 404)
            return abort('404');
        }
    }

    public function searching(Request $request)
    {
        $search = $request['search'];
        if ($search != "") {
            $produk = Produk::where('nama_produk','LIKE', '%'.$search.'%')
                            ->orWhereRelation('kategori','nama_kategori','LIKE', '%'.$search.'%')
                            ->get();
        } else {
            $produk = Produk::all();
        }
        $data = array('produk' => $produk,'search'=> $search);
        return view('homepage.search', $data);
    }

    public function allProduk()
    {
        $itemproduk = Produk::orderBy('created_at', 'desc')->get();
        $itempromo = ProdukPromo::orderBy('created_at', 'desc')->get();
        $data = array( 'itemproduk' => $itemproduk, 'itempromo' => $itempromo,);
        return view('homepage.semua_produk', $data);
    }

}
