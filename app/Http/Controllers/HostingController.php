<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HostingController extends Controller
{
    public function __construct()
    {
        //$this->StokModel = new StokModel();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data API dari CWP
        $ch = curl_init();
        $data = array("key" => "hallobro", "action" => 'list');
        $url = 'https://ta.poliwangi.ac.id:2304/v1/account';
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        // Ambil total pendaftar
        $pendaftar = Pendaftaran::select('id')->count();

        return view('hosting.index', compact('result'), compact('pendaftar'));
    }

    /**
     * Menambahkan user baru pada CWP
     */
    public function adduser($id)
    {
        // Mengambil data sesuai id yang direquest
        $pendaftar = Pendaftaran::find($id);
        $nim = $pendaftar->nim;
        $email = $pendaftar->email;
        $password = $pendaftar->password;
        $paket = $pendaftar->paket;

        //Membuat username
        $pro = "ti";
        $th = substr($nim, 2, 2);
        $nu = substr($nim, -3);
        $username = $pro . $th . $nu;

        //Membuat domain
        $sub = $username;
        $dom = "ta.poliwangi.ac.id";
        $domain = $sub . $dom;

        //Mengirim request pendaftaran akun ke server
        $ch = curl_init();
        $data = array("key" => 'hallobro', "action" => 'add', "domain" => $domain, "user" => $username, "pass" => $password, "email" => $email, "package" => $paket, "inode" => 0, "limit_nproc" => 40, "limit_nofile" => 0, "server_ips" => '103.164.60.3', "autossl" => 1);
        $url = 'https://ta.poliwangi.ac.id:2304/v1/account';
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);

        return back();
    }
    /**
     * Menampilkan User yang terdaftar di CWP
     */
    public function showuser()
    {
        $ch = curl_init();
        $data = array("key" => "hallobro", "action" => 'list');
        $url = 'https://ta.poliwangi.ac.id:2304/v1/account';
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        $jumlahDataPerHal = 15;
        $jumlahData = count($result["msj"]);
        $jumlahHal = ceil($jumlahData / $jumlahDataPerHal);
        $halAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
        $awalData = ($jumlahDataPerHal * $halAktif) - $jumlahDataPerHal;
        $kondisi = $halAktif * 15;
        $nomor = $awalData + 1;
        // dd($halAktif);
        return view('hosting.user', compact('result'), [
            'jumlahDataPerHal' => $jumlahDataPerHal,
            'jumlahData' => $jumlahData,
            'jumlahHal' => $jumlahHal,
            'halAktif' => $halAktif,
            'awalData' => $awalData,
            'kondisi' => $kondisi,
            'nomor' => $nomor
        ]);
    }

    /**
     * Menghapus User Pada CWP
     */
    public function deluser($id)
    {
        // Ambil Data List User CWP
        $ch = curl_init();
        $data = array("key" => "hallobro", "action" => 'list');
        $url = 'https://ta.poliwangi.ac.id:2304/v1/account';
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);
        $username = $result["msj"]["$id"]["username"];
        $email = $result["msj"]["$id"]["email"];

        // Proses Hapus User di CWP
        $ch1 = curl_init();
        $data1 = array("key" => "hallobro", "action" => 'del', "user" => $username, "email" => $email);
        $url1 = 'https://ta.poliwangi.ac.id:2304/v1/account';
        $headers1 = array();
        $headers1[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers1);
        curl_setopt($ch1, CURLOPT_URL, $url1);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_POST, 1);
        curl_setopt($ch1, CURLOPT_POSTFIELDS, http_build_query($data1));
        curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch1);
        curl_close($ch1);
        return back();
    }

    /**
     * Mensuspend User
     */
    public function suspend($username)
    {
        $ch = curl_init();
        $data = array("key" => "hallobro", "action" => 'susp', "user" => $username);
        $url = 'https://ta.poliwangi.ac.id:2304/v1/account';
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        return back();
    }

    /**
     * Mengunsuspend User
     */
    public function unsuspend($username)
    {
        $ch = curl_init();
        $data = array("key" => "hallobro", "action" => 'unsp', "user" => $username);
        $url = 'https://ta.poliwangi.ac.id:2304/v1/account';
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);
        return back();
    }

    /**
     * Menampilkan pendaftar akun hosting
     */
    public function showpendaftar()
    {
        $pendaftar = Pendaftaran::all();
        $publicpath = '../storage/app/public/';
        // dd($publicpath);
        return view('hosting.pendaftar', compact('pendaftar'), compact('publicpath'));
    }

    /**
     * Mengahapus pendaftar akun hosting
     */
    public function delpendaftar($id)
    {
        // $file = Pendaftaran::select('formulir')->where('id', $id)->get();
        // Pendaftaran::destroy($id);
        $file = Pendaftaran::find($id);

        if ($file) {
            $namafile = public_path('storage/' . $file->formulir);
            if (File::exists($namafile)) {
                File::delete($namafile);
            }
            $file->delete();
        }

        return back();
    }
}
