<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBusAmenityRequest;
use App\Http\Resources\AmenityResource;
use App\Http\Resources\BusAmenityResource;
use App\Models\Amenity;
use App\Models\BusAmenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusAmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amenties = BusAmenity::all();
        return BusAmenityResource::collection($amenties);
    }

    public function busAmenities($busNo)
    {
        $busAmenities = BusAmenity::where('bus_no', $busNo)->get();
        $amenties = Amenity::find($busAmenities);
        return (new AmenityResource($amenties))->additional([
            "message" => "Bus amenities fetched successfully"
        ]);
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
    public function store(StoreBusAmenityRequest $request)
    {
        $busAmenity = BusAmenity::create([
            'bus_no' => $request->bus_no,
            'amenity_id' => $request->amenity_id
        ]);
        return (new BusAmenityResource($busAmenity))->additional([
            "message" => "Bus amenity added successfully"
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $bus_no, int $amenity_id)
    {
        $amenity = BusAmenity::where('bus_no', $bus_no)->where('amenity_id', $amenity_id)->first();
        $busAmenities = DB::table('bus_amenities')
            ->where('bus_no', $bus_no)
            ->where('amenity_id', $amenity_id)
            ->delete();
        $amenties = Amenity::find($busAmenities);
        return (new AmenityResource($amenties))->additional([
            "message" => "Bus amenities fetched successfully"
        ]);
    }
}
