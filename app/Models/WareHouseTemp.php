<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHouseTemp extends Model
{
    use HasFactory;

    protected $table = 'ware_house_temps';

    protected $fillable = [
        'product_id',
        'user_id',
        'size_id',
        'quantity',
        'price_import'
    ];


   
}
