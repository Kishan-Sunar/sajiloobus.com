<?php

namespace App\Http\Resources;

use App\Models\BusType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BusResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->map(
            function ($bus) {
                return [
                    'bus_no' => $bus->bus_no,
                    'featured_photo_path' => $bus->featured_photo_path,
                    'name' => $bus->name,
                    'bus_type' => new BusTypeResource(BusType::where('id', $bus->bus_type)->get())
                ];
            }
        );
    }
}
