<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('color');
            $table->string('size');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->integer('sales');
            $table->dateTime('create_date');
            $table->dateTime('update_date')->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_options');
    }
}
