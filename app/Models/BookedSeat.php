<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedSeat extends Model
{
    use HasFactory;
    protected $fillable = [
        'booked_id',
        'schedule_id',
        'seat_no',
        'status',
    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booked_id');
    }
}
