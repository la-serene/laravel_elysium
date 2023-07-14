<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory1 extends Model
{
    protected $fillable = ['category_id', 'title'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory2()
    {
        return $this->hasMany(Subcategory2::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}