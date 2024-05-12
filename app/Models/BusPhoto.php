<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BusPhoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'photo_path',
        'bus_no',
    ];
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_no', 'bus_no');
    }
}
