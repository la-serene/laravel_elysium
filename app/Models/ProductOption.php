<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $fillable = [
        'product_id',
        'color',
        'size',
        'stock',
        'sales',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    private function getDiscountedPrice(): float|int
    {
        return $this->getAttribute('price') * $this->getAttribute('discount') * 1000;
    }
}
