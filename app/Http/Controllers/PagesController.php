<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class PagesController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $nama = 'Fendi';
        return view('index', ['nama' => $nama]);
    }
    public function about()
    {
        $nama = 'Fendi';
        return view('about', ['nama' => $nama]);
    }
}