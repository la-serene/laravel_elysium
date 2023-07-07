<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private function getDiscountedPrice(): float|int
    {
        return $this->getAttribute('price') * $this->getAttribute('discount') * 1000;
    }
}
