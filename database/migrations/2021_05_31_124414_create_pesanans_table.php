<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->bigIncrements('ID_PESANAN');
            $table->string('NAMA_KONSUMEN');
            $table->bigInteger('ID_PRODUK');
            $table->string('NAMA_PRODUK');
            $table->bigInteger('HARGA');
            $table->bigInteger('JUMLAH_BELI');
            $table->bigInteger('JUMLAH_BAYAR');
            $table->date('TANGGAL_PESAN')->useCurrent();
            $table->softDeletes();
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
        Schema::dropSoftDeletes('pesanans');
    }
}
