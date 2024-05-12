<?php

namespace App\Http\Resources;

use App\Models\Amenity;
use App\Models\Bus;
use App\Models\BusAmenity;
use App\Models\BusPhoto;
use App\Models\BusType;
use App\Models\Location;
use App\Models\RoutePoint;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return parent::toArray($request);
    }
}
