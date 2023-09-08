<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $table = 'providers';

    protected $fillable = [
        'provider_code',
        'provider_name',
        'provider_email',
        'provider_phone',
        'provider_city',
        'provider_district',
        'provider_ward',
        'provider_street',
        'status'
    ];


   
}
