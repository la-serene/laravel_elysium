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
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('subcategory_id1')->references('id')->on('sub_category1s');
            $table->foreign('subcategory_id2')->references('id')->on('sub_category2s');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
