<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Passenger extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'address',
        'contact',
        'gender',
        'dob',
    ];
    public function passenger()
    {
        return $this->hasMany(Booking::class, 'booked_by', 'id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function review(): HasMany
    {
        return $this->hasMany(Review::class, 'passenger_id', 'id');
    }
}
