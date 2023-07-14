<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'category_id', 'subcategory_id1', 'subcategory_id2', 'price', 'total_sales', 'total_stock', 'discount', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory1()
    {
        return $this->belongsTo(Subcategory1::class);
    }

    public function subcategory2()
    {
        return $this->belongsTo(Subcategory2::class);
    }

    public function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }
    public function orderDetails()
    {
    return $this->hasMany(OrderDetail::class);
    }

    public function getDiscountedPrice()
    {
    $discountedPrice = $this->price - ($this->price * ($this->discount / 100));
    return $discountedPrice;
    }
}