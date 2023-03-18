<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = "subcategories";
    protected $fillable = [
        'category_id',
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
