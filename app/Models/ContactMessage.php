<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'message',
        'email',
        'is_answered',
        'answer',
        'created_at'
    ];

    protected $casts =  [
            'message' => 'string',
            'is_answered' => 'boolean',
        ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
