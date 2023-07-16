<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public function subcategory1s()
    {
        return $this->hasMany(Subcategory1::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
