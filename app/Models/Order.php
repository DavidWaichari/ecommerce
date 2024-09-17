<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Allow mass assignment on these fields
    protected $fillable = [
        'user_id',
        'sub_total',
        'tax_amount',
        'shipping_cost',
        'total_amount',
        'payment_method'.
        'status',
        'delivery_instructions',
        'contact_number',
        'extras'
    ];

    /**
     * Define the relationship between Order and User
     * An Order belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship between Order and OrderItem
     * An Order can have many OrderItems
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
