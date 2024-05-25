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
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('category_name', 255);
            $table->string('subcategory_name', 255)->nullable();
            $table->string('sub_subcategory_name', 255)->nullable();
            $table->string('sku', 255)->nullable();
            $table->string('sale_price', 255)->nullable();
            $table->string('regular_price', 255)->nullable();
            $table->string('commission', 255)->nullable();
            $table->string('bootstrap_v', 255)->nullable();
            $table->string('released', 255)->nullable();
            $table->string('updated', 255)->nullable();
            $table->string('version', 255)->nullable();
            $table->string('seller_name', 255)->nullable();
            $table->string('seller_email', 255)->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->text('change_log')->nullable();
            $table->text('youtube_iframe')->nullable();
            $table->text('header_content')->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->string('facebook_meta_title', 255)->nullable();
            $table->string('facebook_meta_description', 255)->nullable();
            $table->string('twitter_meta_title', 255)->nullable();
            $table->string('twitter_meta_description', 255)->nullable();
            $table->tinyInteger('order_type')->default(0)->nullable();
            $table->tinyInteger('is_featured')->default(0)->nullable();
            $table->text('live_preview_link')->nullable();
            $table->text('admin_link')->nullable();
            $table->text('downloadable_link')->nullable();
            $table->string('image', 255)->default('default.png');
            $table->string('img_alt_text', 255)->nullable();
            $table->string('icon', 255)->default('default.png');
            $table->string('icon_alt_text', 255)->nullable();
            $table->string('thumb', 255)->default('default.png');
            $table->string('thumb_alt_text', 255)->nullable();
            $table->string('cover', 255)->default('default.png');
            $table->string('cover_alt_text', 255)->nullable();
            $table->string('og_image', 255)->default('default-og.png');
            $table->string('og_img_alt_text', 255)->nullable();
            $table->tinyInteger('is_index')->default(0)->nullable();
            $table->tinyInteger('is_follow')->default(0)->nullable();
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
