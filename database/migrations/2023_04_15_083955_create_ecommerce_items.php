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
        Schema::create('ecommerce_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->string('category_name', 100);
            $table->string('subcategory_name', 100)->nullable();
            $table->string('sub_subcategory_name', 100)->nullable();
            $table->string('sku', 100);
            $table->string('sale_price', 100)->nullable();
            $table->string('regular_price', 100)->nullable();
            $table->string('commission', 100)->nullable();
            $table->string('bootstrap_v', 100);
            $table->dateTime('released', $precision = 0)->timestamps()->nullable();
            $table->dateTime('updated', $precision = 0)->timestamps()->nullable();
            $table->string('version', 100);
            $table->string('seller_name', 100);
            $table->string('seller_email', 100);
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->text('change_log')->nullable();
            $table->text('youtube_iframe')->nullable();
            $table->text('header_content')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('img_alt_text', 255)->nullable();
            $table->string('og_img_alt_text', 255)->nullable();
            $table->tinyInteger('is_index')->default(0)->nullable();
            $table->tinyInteger('is_follow')->default(0)->nullable();
            $table->tinyInteger('order_type')->default(0)->nullable();
            $table->tinyInteger('is_featured')->default(0)->nullable();
            $table->text('live_preview_link')->nullable();
            $table->text('admin_link')->nullable();
            $table->text('downloadable_link')->nullable();
            $table->string('image', 255)->default('default-image.png');
            $table->string('og_image', 255)->default('default-og-image.png');
            $table->string('file', 255)->default('default-file.mp3');
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
        Schema::dropIfExists('ecommerce_items');
    }
};
