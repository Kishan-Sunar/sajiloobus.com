<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bus extends Model
{
    use HasFactory;
    protected $primaryKey = 'bus_no';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'bus_no',
        'name',
        'featured_photo_path',
        'operator_id',
        'bus_type',
    ];
    public function busType(): BelongsTo
    {
        return $this->belongsTo(BusType::class, 'bus_type', 'id');
    }

    public function busPhoto()
    {
        return $this->hasMany(BusPhoto::class, 'bus_no', 'bus_no');
    }
    public function busAmenity()
    {
        return $this->hasMany(BusAmenity::class, 'bus_no', 'bus_no');
    }
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'bus_no', 'bus_no');
    }

    public function review(): HasMany
    {
        return $this->hasMany(Review::class, 'bus_no', 'bus_no');
    }
}
