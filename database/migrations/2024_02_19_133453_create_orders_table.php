<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_code');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->timestamp('receipt_time');
            $table->float('unit_price');
            $table->unsignedBigInteger('machining_method_id');
            $table->foreign('machining_method_id')->references('id')->on('machining_methods');
            $table->unsignedBigInteger('meterial_id');
            $table->foreign('meterial_id')->references('id')->on('meterials');
            $table->unsignedInteger('oder_type');
            $table->float('width');
            $table->float('hight');
            $table->unsignedInteger('status');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
