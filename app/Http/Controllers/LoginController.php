<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $data = array('title' => 'Login');
        return view('auth.login', $data);
    }
}
