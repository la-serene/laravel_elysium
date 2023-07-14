<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['title'];

    public function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }
}
