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
        Schema::create('ecommerce_leads', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('ecommerce_leads');
    }
};
