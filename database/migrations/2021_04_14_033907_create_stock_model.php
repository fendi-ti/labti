<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->string('name','100');
            $table->string('spesifikasi','200');
            $table->integer('stok')->default('0');
            $table->char('satuan','10');
            $table->date('tanggal_masuk');
            $table->timestamps();
        });
        // Schema::table('outstocks', function ($table) {
        //     $table->foreign('id_barang')
        //     ->references('id_barang')
        //     ->on('stocks')
        //     ->onUpdate('cascade')
        //     ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
