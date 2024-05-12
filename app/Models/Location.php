<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'city',
        'city_code',
        'name',
        'lat',
        'lng',
    ];
    public function origin(): HasMany
    {
        return $this->hasMany(Schedule::class, 'origin', 'id');
    }
    public function destination(): HasMany
    {
        return $this->hasMany(Schedule::class, 'destination', 'id');
    }
    public function location(): HasMany
    {
        return $this->hasMany(RoutePoint::class, 'location_id', 'id');
    }
}
