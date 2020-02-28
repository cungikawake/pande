<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmr', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pasien');
            $table->integer('id_peminjam');
            $table->datetime('tanggal_pinjam');
            $table->datetime('tanggal_kembali');
            $table->string('qrcode');
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
        //
    }
}
