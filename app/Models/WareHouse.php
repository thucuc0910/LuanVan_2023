<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WareHouse extends Model
{
    use HasFactory;

    protected $table = 'ware_houses';

    protected $fillable = [
        'admin_id',
        'provider_id',
        'status',
    ];

    public function provider(){
        return $this->belongsTo(Category::class, 'provider_id','id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id','id');
    }

    
}
