<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutePoint extends Model
{
    use HasFactory;
    protected $fillable = [
        'schedule_id',
        'location_id',
        'type',
    ];
}
