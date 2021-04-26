<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stock_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();
            $table->integer('jumlah_trans');
            $table->timestamp('tgl_trans')->useCurrent();
            $table->string('penerima','20');
            $table->string('keterangan','100');
            $table->timestamps();
            // $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            // $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
