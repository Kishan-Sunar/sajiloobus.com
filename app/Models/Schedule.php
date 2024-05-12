<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'origin',
        'departure',
        'destination',
        'arrival',
        'bus_no',
        'fare',
        'notes',
        'policy'
    ];

    public function bus(): BelongsTo
    {
        return $this->belongsTo(Bus::class, 'bus_no', 'bus_no');
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'origin', 'id');
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'destination', 'id');
    }
    public function routePoint()
    {
        return $this->hasMany(RoutePoint::class, 'schedule_id', 'id');
    }
    public function booking(): HasMany
    {
        return $this->hasMany(Booking::class, 'schedule_id', 'id');
    }
}
