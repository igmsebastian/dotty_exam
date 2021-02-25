<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
    ];

    /**
     * Fetch order instance.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Fetch product instance.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
