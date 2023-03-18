<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value),
        );
    }

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id')->where('status', '1');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
