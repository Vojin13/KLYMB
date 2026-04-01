<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, softDeletes;

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
        return $this->belongsTo(Badge::class, 'badge_id');
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

    public function prices() {
        return $this->hasMany(Price::class);
    }



}
