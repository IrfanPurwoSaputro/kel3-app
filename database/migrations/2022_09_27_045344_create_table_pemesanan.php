<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->bigIncrements('id_pemesanan');
            $table->unsignedBigInteger('jalur_id')->nullable();
            // $table->unsignedBigInteger('kendaraan_id')->nullable();
            // $table->integer('jumlah_kendaraan')->nullable();
            $table->unsignedBigInteger('kode')->nullable();
            $table->date('tanggal_naik')->nullable();
            $table->date('tanggal_turun')->nullable();
            $table->string('status')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->integer('total_harga')->nullable();
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
        Schema::dropIfExists('pemesanan');
    }
};
