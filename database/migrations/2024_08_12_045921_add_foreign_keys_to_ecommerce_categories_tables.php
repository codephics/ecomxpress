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
        // Add category_id to ecommerce_subcategories
        Schema::table('ecommerce_subcategories', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('category_name');
        });

        // Add subcategory_id to ecommerce_sub_subcategories
        Schema::table('ecommerce_sub_subcategories', function (Blueprint $table) {
            $table->unsignedBigInteger('subcategory_id')->nullable()->after('subcategory_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ecommerce_subcategories', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });

        Schema::table('ecommerce_sub_subcategories', function (Blueprint $table) {
            $table->dropColumn('subcategory_id');
        });
    }
};
