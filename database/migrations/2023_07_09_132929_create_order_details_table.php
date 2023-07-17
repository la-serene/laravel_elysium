<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_option_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('total_price', 8, 2);

            //review field
            $table->text('comment');
            $table->integer('rating');
            $table->timestamps();

            $table->primary(['order_id', 'product_option_id', 'product_id']);
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_option_id')->references('id')->on('product_options');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}