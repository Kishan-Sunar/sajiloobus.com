<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'booked_by',
        'schedule_id',
        'passenger_name',
        'passenger_email',
        'passenger_phone',
        'board_point',
        'drop_point',
        'comments',
        'total_amount',
        'payment_method',
        'payment_date',
        'payment_status',
        'status',
    ];

    public function bookedSeats()
    {
        return $this->hasMany(BookedSeat::class, 'booked_id');
    }
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }
    public function passenger(): BelongsTo
    {
        return $this->belongsTo(Passenger::class, 'booked_by', 'id');
    }
}
