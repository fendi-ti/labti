<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstockModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instocks', function (Blueprint $table) {
            $table->increments('id_masuk');
            $table->integer('id_barang');
            $table->date('tgl_masuk')->useCurrent();
            $table->string('penerima','20');
            $table->integer('jumlah_masuk');
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
        Schema::dropIfExists('instocks');
    }
}
