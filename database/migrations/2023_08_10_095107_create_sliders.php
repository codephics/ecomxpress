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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 255);
            $table->string('subheading', 255)->nullable();
            $table->text('detail')->nullable();
            $table->string('image', 255)->default('default-slider.png');
            $table->string('image_alt_text', 255)->nullable();
            $table->string('button_text_1', 255)->nullable();
            $table->string('button_text_2', 255)->nullable();
            $table->string('button_link_1', 255)->nullable();
            $table->string('button_link_2', 255)->nullable();
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
        Schema::dropIfExists('sliders');
    }
};
