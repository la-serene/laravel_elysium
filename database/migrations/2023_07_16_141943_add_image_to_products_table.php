<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateOrdersTableCalculateTotalPrice extends Migration
{
    public function up()
    {
        // Calculate and update the total_price for existing orders
        $orders = DB::table('orders')->select('id')->get();

        foreach ($orders as $order) {
            $totalPrice = DB::table('order_details')
                ->where('order_id', $order->id)
                ->sum('total_price');

            DB::table('orders')
                ->where('id', $order->id)
                ->update(['total_price' => $totalPrice]);
        }
    }

    public function down()
    {
        // Rollback is not necessary as this migration only calculates and updates the total_price
    }
}
