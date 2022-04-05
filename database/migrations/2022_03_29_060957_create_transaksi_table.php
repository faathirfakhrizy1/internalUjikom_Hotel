<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('id_user')->unsigned();
            // $table->bigInteger('id_kamar')->unsigned();
            // $table->date('check_in');
            // $table->date('check_out');
            // $table->string('jumlah_kamar');
            // $table->enum('status', ['waiting for payment', 'process', 'verified', 'failed'])->default('waiting for payment');
            $table->bigInteger('user_id');
            $table->string('id_kamar');
            $table->string('check_in');
            $table->string('check_out');
            $table->string('jumlah_kamar');
            $table->enum('status',['menunggu','dibayar','diverifikasi','gagal','checked_in','checked_out'])->default('menunggu');
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
        Schema::dropIfExists('transaksi');
    }
}
