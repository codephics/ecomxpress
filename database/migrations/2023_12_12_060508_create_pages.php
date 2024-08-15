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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('keywords')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
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

        DB::table('pages')->insert([
            [
                'name' => 'Homepage',
                'title' => 'Homepage',
                'slug' => 'homepage',
            ],
            [
                'name' => 'Shop',
                'title' => 'Shop',
                'slug' => 'shop',
            ],
            [
                'name' => 'Privacy Policy',
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
            ],
            [
                'name' => 'Terms of Service',
                'title' => 'Terms of Service',
                'slug' => 'terms-of-service',
            ],
            [
                'name' => 'About Us',
                'title' => 'About Us',
                'slug' => 'about-us',
            ],
            [
                'name' => 'Overview',
                'title' => 'Overview',
                'slug' => 'overview',
            ],
            [
                'name' => 'Brand',
                'title' => 'Brand',
                'slug' => 'brand',
            ],
            [
                'name' => 'License',
                'title' => 'License',
                'slug' => 'license',
            ],
            [
                'name' => 'Contact Us',
                'title' => 'Contact Us',
                'slug' => 'contact-us',
            ],
            [
                'name' => 'Blog',
                'title' => 'Blog',
                'slug' => 'blog',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
