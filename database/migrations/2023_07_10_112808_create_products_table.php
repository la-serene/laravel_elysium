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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_description')->nullable();
            #$table->foreign('category_id')->references('id')->on('categories');
            #$table->foreign('subcategory_id1')->references('id')->on('sub_category1s');
            #$table->foreign('subcategory_id2')->references('id')->on('sub_category2s');
            $table->decimal('product_price', 8, 2);
            $table->integer('total_sales')->default(0);
            $table->integer('total_stock')->default(0);
            $table->integer('discount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
