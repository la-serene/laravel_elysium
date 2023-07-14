<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory2 extends Model
{
    protected $fillable = ['category_id', 'subcategory_id1', 'title'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory1()
    {
        return $this->belongsTo(Subcategory1::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
