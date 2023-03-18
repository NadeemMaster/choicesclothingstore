<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'sku',
        'small_description',
        'description',
        'cost_price',
        'selling_price',
        'discounted_price',
        'discount_percent',
        'quantity',
        'status',
        'trending',
        'featured',
        'new_arrivals',
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

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productReviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }


}
