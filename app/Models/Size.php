<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['title', 'product_type'];

    public function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }
}
