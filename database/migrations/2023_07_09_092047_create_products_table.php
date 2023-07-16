<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('subcategory_id1');
            $table->foreign('subcategory_id1')->references('id')->on('subcategory1s');
            $table->unsignedBigInteger('subcategory_id2');
            $table->foreign('subcategory_id2')->references('id')->on('subcategory2s');
            $table->decimal('price', 8, 2);
            $table->integer('total_sales')->default(0);
            $table->integer('total_stock')->default(0);
            $table->integer('discount')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
