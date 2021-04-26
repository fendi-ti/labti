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
use App\Models\Type;
use App\Models\Transaction;

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
        return view('stok.stok', ['stok' => $stok]);
    }
    public function formadd()
    {
        return view('stok.formadd');
    }
    public function addbarang(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'spesifikasi' => 'required',
            'satuan' => 'required',
            'tanggal_masuk' => 'required'
        ]);
        //return $request;
          Stock::create($request->all());
          return redirect()->route('formadd')->with('status','Barang Berhasil Ditambahkan');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outstok()
    {
            $outstok = Transaction::join('stocks','stocks.id_barang', '=', 'transactions.id_barang')
                                ->join('types','types.id_jenis','=','transactions.id_jenis')
                                ->get();
            return view('stok.outstok', ['outstok' => $outstok]);
    }
    public function instok()
    {
            $instok = Instock::join('stocks','stocks.id_barang', '=', 'instocks.id_barang')
                                ->get();
            return view('stok.instok', ['instok' => $instok]);
    }
    public function createtrans()
    {
        //
        $nama = Stock::select('id_barang','name')->get();
        $jenis = Type::all();
        // return $jenis;
        return view('stok.addTrans', compact('nama'), compact('jenis'));
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
         return redirect()->route('createin')->with('status','Barang Berhasil Ditambahkan');
    }
    public function storetrans(Request $request)
    {
        // Validasi Inputan
        $request->validate([
            'jenis' => 'required',
            'barang' => 'required',
            'terima' => 'required',
            'jumlah' => 'required',
            'terang' => 'required'
        ]);
        // Insert Tabel Transaksi
        Transaction::create([
            'id_jenis' => $request->jenis,
            'id_barang' => $request->barang,
            'penerima' => $request->terima,
            'jumlah_trans' => $request->jumlah,
            'keterangan' => $request->terang
        ]);
        // Update jumlah stock
        $data = Stock::select('id_barang','stok')->get();
        $idjenis = $request->jenis;
        if($idjenis==1)
        {
            foreach($data as $data){
                $stokawal = $data['stok'];
                $tambah = $request->jumlah;
                $stokakhir = $stokawal + $tambah;
            }
            Stock::where('id_barang', $request->barang)
                    ->update(['stok'=> $stokakhir]);
            return redirect()->route('createtrans')->with('status','Barang Berhasil Dikeluarkan');
        }else{
            foreach($data as $data){
                $stokawal = $data['stok'];
                $kurang = $request->jumlah;
                $stokakhir = $stokawal - $kurang;
            }
            Stock::where('id_barang', $request->barang)
                    ->update(['stok'=> $stokakhir]);
            return redirect()->route('createtrans')->with('status','Barang Berhasil Dikeluarkan');
        }
        // return $tambah;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_barang)
    {
        // $namabarang = Stock::select('name','id_barang')->where('id_barang',$id_barang)->get();
        // $transaksi = Transaction::join('stocks','stocks.id_barang', '=', 'transactions.id_barang')
        //                         // ->join('types','types.id_jenis','=','transactions.id_jenis')
        //                         ->find('id_barang',$id_barang);
        // $transaksi = Transaction::where('id_barang',$id_barang)->get();
        // return view('stok.print', compact('transaksi'));
        $trans = Stock::find($id_barang)->comments;
        return $trans;
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
    public function print()
    {
        $transaksi = Transaction::join('stocks','stocks.id_barang', '=', 'transactions.id_barang')
                                ->join('types','types.id_jenis','=','transactions.id_jenis')
                                ->get();
            return view('stok.print', compact('transaksi'));
        // return view('stok.print');
    }
    public function printpdf()
    {
        $transaksi = Transaction::join('stocks','stocks.id_barang', '=', 'transactions.id_barang')
                                ->join('types','types.id_jenis','=','transactions.id_jenis')
                                ->get();
            return view('stok.printpdf', compact('transaksi'));
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
