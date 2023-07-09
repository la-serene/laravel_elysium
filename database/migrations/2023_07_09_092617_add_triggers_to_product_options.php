<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddTriggersToProductOptions extends Migration
{
    public function up()
    {
        // Add trigger to update products.total_sales
        DB::unprepared('
            CREATE TRIGGER update_total_sales
            AFTER INSERT ON product_options
            FOR EACH ROW
            BEGIN
                UPDATE products
                SET total_sales = (SELECT SUM(sales) FROM product_options WHERE product_id = NEW.product_id)
                WHERE id = NEW.product_id;
            END
        ');

        // Add trigger to update products.total_stock
        DB::unprepared('
            CREATE TRIGGER update_total_stock
            AFTER INSERT ON product_options
            FOR EACH ROW
            BEGIN
                UPDATE products
                SET total_stock = (SELECT SUM(stock) FROM product_options WHERE product_id = NEW.product_id)
                WHERE id = NEW.product_id;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_total_sales');
        DB::unprepared('DROP TRIGGER IF EXISTS update_total_stock');
    }
}
