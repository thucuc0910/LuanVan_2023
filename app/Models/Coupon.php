<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    protected $fillable = [
        'coupon_code',
        'coupon_name',
        'coupon_type',
        'amount',
        'start_date',
        'end_date',
        'status'
    ];
}
