<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggerUpdateProductTotals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER update_product_totals
            AFTER INSERT ON product_options
            FOR EACH ROW
            BEGIN
                UPDATE products
                SET total_stock = (
                    SELECT SUM(stock) FROM product_options WHERE product_id = NEW.product_id
                ), total_sales = (
                    SELECT SUM(sales) FROM product_options WHERE product_id = NEW.product_id
                )
                WHERE id = NEW.product_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_product_totals');
    }
}
