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
        Schema::create('kontak_darurat', function (Blueprint $table) {
            $table->bigIncrements('id_kontak_darurat');
            $table->unsignedBigInteger('pemesanan_id');
            $table->string('nama');
            $table->string('no_telpon');
            $table->string('alamat');
            $table->string('hubungan');
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
        Schema::dropIfExists('kontak_darurat');
    }
};
