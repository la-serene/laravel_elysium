<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public function subcategory1()
    {
        return $this->hasMany(Subcategory1::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

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
