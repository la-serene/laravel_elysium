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
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id1')->nullable();
            $table->unsignedBigInteger('subcategory_id2')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('total_sales')->default(0);
            $table->integer('total_stock')->default(0);
            $table->integer('discount')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->default("https://www.google.com/url?sa=i&url=https%3A%2F%2Fbattle-cats.fandom.com%2Ff%2Fp%2F4400000000000819492&psig=AOvVaw02DfXmEDXJjhOHCj7yZE70&ust=1689734062218000&source=images&cd=vfe&opi=89978449&ved=0CA0QjRxqFwoTCLiahIacl4ADFQAAAAAdAAAAABAE");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
