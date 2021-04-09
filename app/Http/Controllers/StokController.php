<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StokModel;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->StokModel = new StokModel();
        $this->middleware('auth');
    }
    public function home()
    {
        return view('stok.index');
    }
    public function index()
    {
        $stok = StokModel::SimplePaginate(10);
        /**$stok = [
         *    'stok' => $this->StokModel->allData(),
         *];
         */
        return view('stok.stok', ['habis_pakai' => $stok]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outstok()
    {
        $outstok = [
            'outstok' => $this->StokModel->historyAllData(),
        ];
        return view('stok.outstok', $outstok);
    }
    public function create()
    {
        //
    }
    public function ambilNamabarang()
    {
        $nama = [
            'nama' => $this->StokModel->ambilNamaBarang(),
        ];
        return view('stok.addBarang', $nama);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Request()->validate([
            'barang' => 'required',
            'jumlah' => 'required',
            'terima' => 'required',
            'terang' => 'required',
        ]);
        //$id_barang => Request()->barang;
        //$jumlah_keluar => Request()->jumlah;
        // $penerima => Request()->terima;
        //$keterangan => Request()->terang;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $history = [
            'history' => $this->StokModel->historyData($id),
        ];
        return view('stok.history', $history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_barang)
    {
        //
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
    public function testpage()
    {
        $stok = StokModel::paginate();
        /**$stok = [
         *    'stok' => $this->StokModel->allData(),
         *];
         */
        return view('stok.testpage', ['habis_pakai' => $stok]);
    }
}
