<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_id',
        'stripe_customer_id',
        'transaction_id',
        'status',
        'amount',
        'date'
    ];

    protected $casts = [
        'date' => 'datetime',
        'amount' => 'decimal:2'
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
