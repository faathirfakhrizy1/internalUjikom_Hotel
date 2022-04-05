<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipeKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_kamar', function (Blueprint $table) {
            $table->id();
            // $table->string('nama');
            // $table->string('stok');
            // $table->string('harga');
            // $table->string('onbook')->default(0);
            // $table->string('onuse')->default(0);
            // $table->string('information');
            $table->string('name');
            $table->string('id_fasilitas');
            $table->string('info');
            $table->string('harga');
            $table->string('foto');
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
        Schema::dropIfExists('tipe_kamar');
    }
}
