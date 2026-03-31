<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Badge extends Model
{
    use softDeletes;

    protected $fillable = [
        'name',
        'bg_color',
        'text_color',
    ];

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
