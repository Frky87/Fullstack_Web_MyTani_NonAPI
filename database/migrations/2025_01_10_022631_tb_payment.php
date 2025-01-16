<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Menambahkan kolom user_id
            $table->foreignId('productId')->constrained('id')->on('tb_produk')->onDelete('cascade');
            $table->integer('quantity');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->date('payment_date');
            $table->decimal('total_paid', 10, 2);
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_payment');
    }
};
