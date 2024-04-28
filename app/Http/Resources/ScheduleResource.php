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
use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->map(function ($schedule) {
            $amenities = Amenity::find(BusAmenity::where('bus_no', $schedule->bus_no)->pluck('amenity_id'));
            return [
                'id' => $schedule->id,
                'name' => $schedule->name,
                'origin' => new LocationResource(Location::where('id', $schedule->origin)->get()),
                'destination' => new LocationResource(Location::where('id', $schedule->destination)->get()),
                'departure' => $schedule->departure,
                'arrival' => $schedule->arrival,
                'bus' => (new BusResource(Bus::where('bus_no', $schedule->bus_no)->get())),
                'photos' => new BusPhotoResource(BusPhoto::where('bus_no', $schedule->bus_no)->get()),
                'points' => new RoutePointResource(RoutePoint::where('schedule_id', $schedule->id)->get()),
                'amenities' => new AmenityResource($amenities),
                'fare' => $schedule->fare,
                'policy' => $schedule->policy,
                'notes' => $schedule->notes,
            ];
        });
    }
}
