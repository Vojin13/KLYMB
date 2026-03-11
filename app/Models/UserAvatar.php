<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAvatar extends Model
{
    protected $fillable = [
        'user_id',
        'path',
        'type',
        'size',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'size' => 'integer'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
