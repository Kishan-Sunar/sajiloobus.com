<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoutePoint extends Model
{
    use HasFactory;
    protected $fillable = [
        'schedule_id',
        'location_id',
        'type',
    ];
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }
}
