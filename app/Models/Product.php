<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='products';

    protected $fillable = [
        'category_id',
        'name',
        // 'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        // 'quantity',
        'trending',
        // 'meta_title',
        // 'meta_keyword',
        // 'meta_description',
        'status',

    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'product_id','id');
    }
}
