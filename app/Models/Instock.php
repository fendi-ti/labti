<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instock extends Model
{
    use HasFactory;
    protected $fillable = ['id_barang','tgl_masuk','penerima','jumlah_masuk','keterangan','created_at','updated_at'];
}
