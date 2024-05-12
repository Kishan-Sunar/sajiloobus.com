<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'full_name',
        'role',
        'status',
        'contact',
        'dob',
        'profile_photo_path',
        'password',
        'provider',
        'provider_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => UserRole::class,
        'status' => UserStatus::class,
    ];

    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }

    public function isPassenger(): bool
    {
        return $this->role === UserRole::PASSENGER;
    }

    public function isOperator(): bool
    {
        return $this->role === UserRole::OPERATOR;
    }

    public function passenger()
    {
        return $this->hasOne(Passenger::class, 'user_id', 'id');
    }
}
