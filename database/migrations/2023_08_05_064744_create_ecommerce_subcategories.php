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
        Schema::create('ecommerce_subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('subcategory_name', 199);
            $table->string('slug', 199);
            $table->string('category_name', 199);
            $table->string('description', 199)->nullable();
            $table->string('meta_title', 199)->nullable();
            $table->string('meta_description', 199)->nullable();
            $table->string('icon', 255)->default('default-icon.png');
            $table->string('thumb', 255)->default('default-icon.png');
            $table->string('cover', 255)->default('default-icon.png');
            $table->string('og_image', 255)->default('default-icon.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecommerce_subcategories');
    }
};
