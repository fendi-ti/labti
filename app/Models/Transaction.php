<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['stock_id','type_id','saldo','jumlah_trans','penerima','tgl_trans','keterangan','created_at','updated_at'];
}
