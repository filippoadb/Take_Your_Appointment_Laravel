<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{

    function welcome() {
        return view('welcome');
    }

    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    // Altri metodi del controller

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
