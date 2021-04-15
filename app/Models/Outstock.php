<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outstock extends Model
{
    use HasFactory;
    protected $fillable = ['id_barang','tgl_keluar','penerima','jumlah_keluar','keterangan','created_at','updated_at'];
}
