<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
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
            //'g-recaptcha-response' => 'recaptcha'
        ]);

        // $fileModel = new Pendaftaran;

        // $fileModel->nim = $request->nim;
        // $fileModel->nama = $request->nama;
        // $fileModel->email = $request->email;
        // $fileModel->password = $request->password;
        // $fileModel->paket = $request->paket;
        // $fileModel->formulir = time() . '_' . $request->formulir->getClientOriginalName();
        // $fileModel->save();
        //$fileModel->file_path = '/storage/' . $filePath;
        // return back()
        // ->with('success','File has been uploaded.')
        // ->with('file', $fileName);

        Pendaftaran::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'paket' => $request->paket,
            'formulir' => $request->formulir->getClientOriginalName()
        ]);
        $filenameSimpan = $request->formulir->getClientOriginalName();
        $path = $request->file('formulir')->storeAs('public', $filenameSimpan);
        return back()
            ->with('success', 'File has been uploaded.');
        // dd('berhasil input data');
    }
}
