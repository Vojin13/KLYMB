<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'date_of_birth',
        'code',
        'is_active',
        'role_id',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function contactMessages() {
        return $this->hasMany(ContactMessage::class);
    }

    public function avatars() {
        return $this->hasMany(UserAvatar::class);
    }

    public function getActiveAvatarAttribute() {
        return $this->avatars()->where('is_active', true)->first();
    }

    protected $casts = [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean'
    ];
}
