<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_keranjang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // User yang menambah produk ke keranjang
            $table->unsignedBigInteger('produk_id');  // ID produk yang ditambahkan ke keranjang
            $table->integer('jumlah');  // Jumlah produk yang ditambahkan
            $table->unsignedBigInteger('payment_id')->nullable();  // Kolom untuk payment_id yang menghubungkan ke tb_payment
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('produk_id')->references('id')->on('tb_produk')->onDelete('cascade');
            // $table->foreign('payment_id')->references('id')->on('tb_payment')->onDelete('cascade');  // Relasi ke tabel tb_payment
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_keranjang');
    }
};
