<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusAmenity extends Model
{
    use HasFactory;
    protected $fillable = [
        'bus_no',
        'amenity_id'
    ];
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_no', 'bus_no');
    }
    public function amenity()
    {
        return $this->belongsTo(Amenity::class, 'amenity_id', 'id');
    }
}
