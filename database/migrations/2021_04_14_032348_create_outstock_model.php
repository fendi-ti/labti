<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutstockModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outstocks', function (Blueprint $table) {
            $table->increments('id_keluar');
            $table->integer('id_barang');
            $table->date('tgl_keluar')->useCurrent();
            $table->string('penerima','20');
            $table->integer('jumlah_keluar');
            $table->string('keterangan','100');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outstocks');
    }
}
