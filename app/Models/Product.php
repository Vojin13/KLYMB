<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'brand_id',
        'badge_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function badge() {
        return $this->belongsTo(Badge::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class)->orderBy('position');
    }

    public function primaryImage() {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function price() {
        return $this->hasOne(Price::class)->where('is_active', true);
    }



}
