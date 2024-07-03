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
        Schema::create('ecommerce_pre_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->text('address', 255)->nullable();
            $table->text('quantity')->nullable();
            $table->tinyInteger('shipping_method')->nullable();
            $table->string('product_name', 255)->nullable();
            $table->decimal('product_price', 8, 2)->nullable();
            $table->decimal('sub_total', 8, 2)->nullable();
            $table->decimal('delivery_charge', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->text('order_note')->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecommerce_pre_orders');
    }
};
