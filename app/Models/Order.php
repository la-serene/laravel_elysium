<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function calculateTotalPrice()
    {
        return $this->orderDetails()->sum('total_price');
    }
}
class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'product_option_id',
        'product_id',
        'quantity',
        'total_price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function productOption()
    {
        return $this->belongsTo(ProductOption::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function calculateTotalPrice()
    {
        return $this->product->price * $this->quantity;
    }

    public function save(array $options = [])
    {
    $this->total_price = $this->calculateTotalPrice();
    return parent::save($options);
    }
}
