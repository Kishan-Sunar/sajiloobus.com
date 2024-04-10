<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Http\Resources\BusPhotoResource;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function allLocations() {
        $locations = Location::all();
        return (new LocationResource($locations, 'Success'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $location = Location::create([
            'city'=> $request->city,
            'city_code'=> $request->city_code,
            'name'=> $request->name,
            'lat'=> $request->lat,
            'lng'=> $request->lng,
        ]);
        return (new LocationResource($location, 'Added successfully'))->additional([
            "message" => "Location added successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $location = Location::find($request->id);
        $location->city = $request->city;
        $location->city_code = $request->city_code;
        $location->name = $request->name;
        $location->lat = $request->lat;
        $location->lng = $request->lng;
        return (new BusPhotoResource($location, 'Updated successfully'))->additional([
            "message" => "Updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $location = Location::find($id);
        $location->delete();
        return (new BusPhotoResource($location, 'Deleted successfully'))->additional([
            "message" => "Deleted successfully"
        ]);
    }
}
