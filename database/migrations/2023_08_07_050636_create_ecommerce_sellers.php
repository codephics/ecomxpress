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
        Schema::create('ecommerce_sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('gender', 255);
            $table->string('bio', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('youtube_iframe')->nullable();
            $table->text('header_content')->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->string('facebook_meta_title', 255)->nullable();
            $table->string('facebook_meta_description', 255)->nullable();
            $table->string('twitter_meta_title', 255)->nullable();
            $table->string('twitter_meta_description', 255)->nullable();
            $table->string('icon', 255)->default('default-icon.png');
            $table->string('icon_alt_text', 255)->nullable();
            $table->string('thumb', 255)->default('default-thumb.png');
            $table->string('thumb_alt_text', 255)->nullable();
            $table->string('cover', 255)->default('default-cover.png');
            $table->string('cover_alt_text', 255)->nullable();
            $table->string('og_image', 255)->default('default-icon.png');
            $table->string('og_img_alt_text', 255)->nullable();
            $table->tinyInteger('is_index')->default(0)->nullable();
            $table->tinyInteger('is_follow')->default(0)->nullable();
            $table->tinyInteger('is_featured')->default(0)->nullable();
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
        Schema::dropIfExists('ecommerce_sellers');
    }
};
