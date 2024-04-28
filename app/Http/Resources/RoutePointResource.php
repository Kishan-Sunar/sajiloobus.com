<?php

namespace App\Http\Resources;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RoutePointResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->map(function ($points) {
            return [
                'id' => $points->id,
                'location' => new LocationResource(Location::where('id', $points->location_id)->get()),
                'type' => $points->type,
            ];
        });
    }
}
