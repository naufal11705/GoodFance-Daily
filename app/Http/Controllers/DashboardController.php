<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $itemuser = $request->user();
        $user = $request->user();
        $produkCount = Produk::where('user_id', $user->id)->get()->count();
        $pesanCount = ChMessage::where('to_id', $user->id)->where('seen', '0')->get()->count();
        $userCount = User::where('role', 'user')->get()->count();
        $sellerCount = User::where('role', 'seller')->get()->count();
        if($user->role == "seller"){
            $itemproduk = Produk::orderBy('created_at', 'desc')->where('user_id', $itemuser->id )->paginate(20);
            $data = array('title' => 'Dashboard','produkCount' => $produkCount,'pesanCount' => $pesanCount,
            'itemproduk' => $itemproduk);
            return view('dashboard.index', $data)->with('no', ($request->input('page', 1) - 1));
        }else if($user->role == "admin"){
            $itemproduk = Produk::orderBy('created_at', 'desc')->paginate(20);
            $data = array('title' => 'Dashboard','produkCount' => $produkCount,'pesanCount' => $pesanCount,
            'userCount' => $userCount,'sellerCount' => $sellerCount,'itemproduk' => $itemproduk);
            return view('admin.dashboard.index', $data)->with('no', ($request->input('page', 1) - 1));
        }
    }
}
