<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Color extends Model
{
    protected $fillable = ['title'];

    public function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }
}

class Size extends Model
{
    protected $fillable = ['title', 'product_type'];

    public function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }
}

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
}

class ProductOption extends Model
{
    protected $fillable = ['product_id', 'stock', 'sales', 'color_id', 'size_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
