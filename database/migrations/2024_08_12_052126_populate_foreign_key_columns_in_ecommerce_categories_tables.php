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
        // Populate category_id in ecommerce_subcategories
        DB::statement("
            UPDATE ecommerce_subcategories esc
            JOIN ecommerce_categories ec ON esc.category_name = ec.category_name
            SET esc.category_id = ec.id;
        ");

        // Populate subcategory_id in ecommerce_sub_subcategories
        DB::statement("
            UPDATE ecommerce_sub_subcategories essc
            JOIN ecommerce_subcategories esc ON essc.subcategory_name = esc.subcategory_name
            SET essc.subcategory_id = esc.id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // There is no need to reverse data population. You may want to clean the foreign key columns instead if necessary.
        DB::statement("UPDATE ecommerce_subcategories SET category_id = NULL;");
        DB::statement("UPDATE ecommerce_sub_subcategories SET subcategory_id = NULL;");
    }
};
