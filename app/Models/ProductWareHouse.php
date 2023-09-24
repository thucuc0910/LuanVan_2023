<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductWareHouse extends Model
{
    use HasFactory;

    protected $table = 'product_ware_houses';

    protected $fillable = [
        'ware_house_id',
        'product_id',
        'size_id',
        'quantity',
        'price_import'

    ];

    /**
     * Get the user that owns the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productSize(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'size_id', 'id');
    }
}
