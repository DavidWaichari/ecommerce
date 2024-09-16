<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Define which fields can be mass assigned
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Define the relationship between OrderItem and Order.
     * An OrderItem belongs to an Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Define the relationship between OrderItem and Product.
     * Assuming you have a Product model, an OrderItem belongs to a Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
