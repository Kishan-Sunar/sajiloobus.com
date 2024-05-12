<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'model',
        'company',
        'type',
        'operator_id',
        'grid_size'
    ];
    public function buses(): HasMany
    {
        return $this->hasMany(Bus::class, 'bus_type', 'id');
    }
}
