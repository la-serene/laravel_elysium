<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageColumnToProductOptionsTable extends Migration
{
    public function up()
    {
        Schema::table('product_options', function (Blueprint $table) {
            $table->string('image')->nullable()->after('size_id');
        });
    }

    public function down()
    {
        Schema::table('product_options', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
