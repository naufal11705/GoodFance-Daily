<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        $produkCount = Produk::where('user_id', $user->id)->get()->count();
        $pesanCount = ChMessage::where('to_id', $user->id)->where('seen', '0')->get()->count();
        $data = array('title' => 'Dashboard','produkCount' => $produkCount,'pesanCount' => $pesanCount);
        if($user->role == "seller"){
            return view('dashboard.index', $data);
        }else if($user->role == "admin"){
            return view('admin.dashboard.index', $data);
        }
    }
}
