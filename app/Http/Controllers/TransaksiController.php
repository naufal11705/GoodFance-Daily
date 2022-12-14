<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\AlamatPengiriman;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;
use Mail;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        if ($itemuser->role == 'admin') {
            // kalo admin maka menampilkan semua cart
            $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'checkout');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
            $data = array('title' => 'Data Transaksi',
                        'itemorder' => $itemorder,
                        'itemuser' => $itemuser);
            return view('admin.transaksi.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);

        } elseif ($itemuser->role == 'seller') {
            // kalo seller maka menampilkan semua cart
            $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'checkout');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
            $data = array('title' => 'Data Transaksi',
                        'itemorder' => $itemorder,
                        'itemuser' => $itemuser);
            return view('seller.transaksi.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);

        } else {
            // kalo member maka menampilkan cart punyanya sendiri
            $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'checkout');
                            $q->where('user_id', $itemuser->id);
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
            $data = array('title' => 'Data Transaksi',
                        'itemorder' => $itemorder,
                        'itemuser' => $itemuser);
            return view('transaksi.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);                        
        }
    }

    public function transaksidetail($id) 
    {
            $itemorder = Cart::where('id', $id);
            $data = array('title' => 'Data Transaksi',
                        'cartid' => $itemorder);
            return view('transaksi.show', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itemuser = $request->user();
        $itemcart = Cart::where('status_cart', 'cart')
                        ->where('user_id', $itemuser->id)
                        ->first();
        if ($itemcart) {
            $itemalamatpengiriman = AlamatPengiriman::where('user_id', $itemuser->id)
                                                    ->where('status', 'utama')
                                                    ->first();
            if ($itemalamatpengiriman) {
                // buat variabel inputan order
                $inputanorder['cart_id'] = $itemcart->id;
                $inputanorder['nama_penerima'] = $itemalamatpengiriman->nama_penerima;
                $inputanorder['no_tlp'] = $itemalamatpengiriman->no_tlp;
                $inputanorder['alamat'] = $itemalamatpengiriman->alamat;
                $inputanorder['provinsi'] = $itemalamatpengiriman->provinsi;
                $inputanorder['kota'] = $itemalamatpengiriman->kota;
                $inputanorder['kecamatan'] = $itemalamatpengiriman->kecamatan;
                $inputanorder['kelurahan'] = $itemalamatpengiriman->kelurahan;
                $inputanorder['kodepos'] = $itemalamatpengiriman->kodepos;
                $itemorder = Order::create($inputanorder);//simpan order
                // update status cart
                $itemcart->update(['status_cart' => 'checkout']);
                return redirect()->route('transaksi.index')->with('success', 'Order berhasil disimpan');
            } else {
                return back()->with('error', 'Alamat pengiriman belum diisi');
            }
        } else {
            return abort('404');//kalo ternyata ga ada shopping cart, maka akan menampilkan error halaman tidak ditemukan
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $no = 0;
        $itemcart = Cart::where('id', $id)->first();
        $itemorder = Order::where('cart_id', $id)->first();
        $detail = $itemcart->detail;
        \Midtrans\Config::$serverKey = 'SB-Mid-server-rCmYLZ93kPNmfms-1RiNaIrx';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        if($itemcart->token == null){
        $params = array(
            'transaction_details' => array(
                'order_id' => $itemcart->no_invoice,
                'gross_amount' => $itemcart->total,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
                "shipping_address" => array(
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->phone,
                    'address' => $itemorder->alamat.', '.$itemorder->kelurahan.', '.$itemorder->kecamatan,
                    'city' => $itemorder->kota,
                    'postal_code' => $itemorder->kodepos,
                ),
            ),

        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $itemcart->update(['token' => $snapToken]);
        } else {
            $snapToken = $itemcart->token; 
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/$itemcart->no_invoice/status",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS =>"\n\n",
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Basic U0ItTWlkLXNlcnZlci1yQ21ZTFo5M2tQTm1mbXMtMVJpTmFJcng6"
          ),
        ));
        
        $response = curl_exec($curl);   
        curl_close($curl);
        $json = json_decode($response);
        if($json->status_code=='404'){
        } else { $itemcart->update(['status_pembayaran' => $json->transaction_status]);}
        $data = array('title' => 'Detail Transaksi',
                    'no' => $no,
                    'itemcart' => $itemcart,
                    'snap_token' => $snapToken);
        return view('transaksi.show', $data);
        //return $response;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $itemuser = $request->user();
        if ($itemuser->role == 'admin') {
            $itemorder = Order::findOrFail($id);
            $data = array('title' => 'Form Edit Transaksi',
                        'itemorder' => $itemorder);
            return view('admin.transaksi.edit', $data)->with('no', 1);
        } elseif ($itemuser->role == 'seller') {
            $itemorder = Order::findOrFail($id);
            $data = array('title' => 'Form Edit Transaksi',
                        'itemorder' => $itemorder);
            return view('seller.transaksi.edit', $data)->with('no', 1);              
        } else {
            return abort('404');//kalo bukan admin maka akan tampil error halaman tidak ditemukan
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cetak_pdf($id)
    {
        $no = '0';
        $itemcart = Cart::where('id', $id)->first();
 
    	$pdf = PDF::loadview('transaksi.transaksi_pdf',[
                    'itemcart'=>$itemcart,
                    'no'=>$no])->setOptions(['defaultFont' => 'poppins']);
                    
    	return $pdf->download('laporan.pdf');
    }

    public function payment_post(Request $request, $id)
    {
        return $request;
    }

}
