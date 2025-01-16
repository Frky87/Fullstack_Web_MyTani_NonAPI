<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable(); // Mengubah id_seller menjadi id_user
            $table->string('product_name');
            $table->string('category');
            $table->decimal('product_price', 10, 2);
            $table->text('product_desc');
            $table->string('product_img');
            $table->integer('product_stock');
            $table->integer('sales')->default(0);  // Menambahkan kolom sales untuk mencatat jumlah penjualan
            $table->timestamps();

            // Mengubah referensi kunci asing untuk id_user
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_produk');
    }
};
