<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_size_id',
        'quantity',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function productSize(){
        return $this->belongsTo(ProductSize::class, 'product_size_id','id');
    }
}

