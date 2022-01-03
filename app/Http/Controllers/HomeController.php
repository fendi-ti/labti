<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function daftar(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric',
            'nama' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'paket' => 'required',
            'formulir' => 'required|mimes:jpg,pdf',
            'g-recaptcha-response' => 'recaptcha'
        ]);
        dd('berhasil input data');
    }
}
