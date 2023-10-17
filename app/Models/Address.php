<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'city',
        'district',
        'ward',
        'detail',
        'phone',
        // 'pincode',
        'status',
    ];
    
}
