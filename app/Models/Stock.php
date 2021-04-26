<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks';
    protected $fillable = ['nama_barang','spesifikasi','stok','satuan','tanggal_masuk','created_at','updated_at'];
    /**
     * Get all of the comments for the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Transaction::class);
    }

}
