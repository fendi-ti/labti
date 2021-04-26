<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $tabel = 'transactions';
    protected $fillable = ['stock_id','type_id','jumlah_trans','penerima','tgl_trans','keterangan','created_at','updated_at'];
    /**
     * Get the user that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Stock::class);
    }
}
