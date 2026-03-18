<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'price',
        'product_id',
        'valid_from',
        'valid_to',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
