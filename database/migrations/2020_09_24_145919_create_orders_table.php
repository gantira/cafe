<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nomor_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('jenis')->comment('dine in, take away');
            $table->double('bayar')->default(0);
            $table->double('kembali')->default(0);
            $table->boolean('paid_status')->default(0)->comment('0: unpaid 1: paid');

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
        Schema::dropIfExists('orders');
    }
}
