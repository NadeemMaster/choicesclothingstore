<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Orderitem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'product_id',
        'order_item_id',
        'rating',
        'comments'
    ];

    public function users()
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
