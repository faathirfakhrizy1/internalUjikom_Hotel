<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            // $table->string('id_fasilitas');
            // $table->string('id_tipe');
            // $table->string('nomor');
            // $table->string('kapasitas');
            // $table->enum('status', ['a', 'na', 'o', 'b'])->default('a');
            $table->string('tipe_kamar');
            $table->string('no_kamar');
            $table->enum('status',['a','b','o'])->default('a');
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
        Schema::dropIfExists('kamar');
    }
}
