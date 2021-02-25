<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email',
        'qty',
        'total',
        'status'
    ];

    /**
     * Include relationship in the instance.
     *
     * @var array
     */
    protected $with = ['items'];

    /**
     * Get orders of the user.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
