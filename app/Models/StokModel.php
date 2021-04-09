<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class StokModel extends Model
{
    protected $table = 'habis_pakai';
    public function allData()
    {
        return DB::table('habis_pakai')->get();
    }
    public function historyData($id)
    {
        return DB::table('outstok')->where('id_barang', $id)->get();
    }
    public function historyAllData()
    {
        return DB::table('outstok')
            ->leftJoin('habis_pakai', 'habis_pakai.id_barang', '=', 'outstok.id_barang')
            ->get();
    }
    public function ambilNamaBarang()
    {
        return DB::table('habis_pakai')
            ->select('id_barang', 'jenis_barang')
            ->get();
    }
}
