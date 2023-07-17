<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order_id', 'product_option_id', 'product_id', 'quantity', 'total_price', 'comment', 'rating'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function productOption()
    {
        return $this->belongsTo(ProductOption::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
