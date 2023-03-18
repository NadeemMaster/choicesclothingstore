<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'name',
        'image',
        'email',
        'contact_no',
        'dob',
        'gender',
        'address',
        'password',
    ];


    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucwords($value),
        );
    }
}
