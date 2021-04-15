<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Models\StokModel;
// use App\Models\OutstokModel;
use App\Models\Stock;
use App\Models\Instock;
use App\Models\Outstock;

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
        /**$stok = [
         *    'stok' => $this->StokModel->allData(),
         *];
         */
        $stok = Stock::Paginate(10);
        return view('stok.stok', ['habis_pakai' => $stok]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outstok()
    {
            $outstok = Outstock::join('stocks','stocks.id_barang', '=', 'outstocks.id_barang')
                                ->get();
            return view('stok.outstok', ['outstok' => $outstok]);
    }
    public function instok()
    {
            $instok = Instock::join('stocks','stocks.id_barang', '=', 'instocks.id_barang')
                                ->get();
            return view('stok.instok', ['instok' => $instok]);
    }
    public function createout()
    {
        //
        $nama = Stock::select('id_barang','name')->get();
        //return $nama;
        return view('stok.addOut', ['nama' => $nama]);
    }
    public function createin()
    {
        //
        $nama = Stock::select('id_barang','name')->get();
        //return $nama;
        return view('stok.addIn', ['nama' => $nama]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storein(Request $request)
    {
        $request->validate([
            'barang' => 'required',
            'terima' => 'required',
            'jumlah' => 'required',
            'terang' => 'required'
        ]);
        Instock::create([
            'id_barang' => $request->barang,
            'penerima' => $request->terima,
            'jumlah_masuk' => $request->jumlah,
            'keterangan' => $request->terang
        ]);
        $data = Stock::select('id_barang','stok')->get();
        foreach($data as $data){
            $stokawal = $data['stok'];
            $tambah = $request->jumlah;
            $stokakhir = $stokawal + $tambah;
        }
        Stock::where('id_barang', $request->barang)
             ->update(['stok'=> $stokakhir]);
         return redirect()->route('createout')->with('status','Barang Berhasil Ditambahkan');
    }
    public function storeout(Request $request)
    {
        $request->validate([
            'barang' => 'required',
            'terima' => 'required',
            'jumlah' => 'required',
            'terang' => 'required'
        ]);
        Outstock::create([
            'id_barang' => $request->barang,
            'penerima' => $request->terima,
            'jumlah_keluar' => $request->jumlah,
            'keterangan' => $request->terang
        ]);
        $data = Stock::select('id_barang','stok')->get();
        foreach($data as $data){
            $stokawal = $data['stok'];
            $kurang = $request->jumlah;
            $stokakhir = $stokawal - $kurang;
        }
         Stock::where('id_barang', $request->barang)
             ->update(['stok'=> $stokakhir]);
         return redirect()->route('createout')->with('status','Barang Berhasil Dikeluarkan');
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
