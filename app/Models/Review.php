<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_no',
        'passenger_id',
        'ratings',
        'comments',
    ];

    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passenger_id', 'id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_no', 'bus_no');
    }
}
