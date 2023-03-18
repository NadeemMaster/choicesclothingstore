<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'tracking_no',
        'fullname',
        'email',
        'phone',
        'province',
        'district',
        'city',
        'postcode',
        'address',
        'status',
        'delivery_status',
        'payment_mode',
        'payment_status',
        'session_id',
        'order_amount'
    ];

    public function orderItems()
    {
        return $this->hasMany(Orderitem::class, 'order_id', 'id');
    }

}
