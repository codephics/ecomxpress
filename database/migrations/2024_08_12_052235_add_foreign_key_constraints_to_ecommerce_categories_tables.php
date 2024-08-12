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
        // Add foreign key constraint to ecommerce_subcategories
        Schema::table('ecommerce_subcategories', function (Blueprint $table) {
            $table->foreign('category_id')
                  ->references('id')->on('ecommerce_categories')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });

        // Add foreign key constraint to ecommerce_sub_subcategories
        Schema::table('ecommerce_sub_subcategories', function (Blueprint $table) {
            $table->foreign('subcategory_id')
                  ->references('id')->on('ecommerce_subcategories')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign key constraints
        Schema::table('ecommerce_subcategories', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        Schema::table('ecommerce_sub_subcategories', function (Blueprint $table) {
            $table->dropForeign(['subcategory_id']);
        });
    }
};
