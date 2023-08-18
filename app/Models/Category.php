<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'active'
    ];

    // public function products()
    // {
    //     // return $this->hasMany(Product::class, 'menu_id', 'id');
    // }
}
