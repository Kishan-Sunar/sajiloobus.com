<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAmentiesRequest;
use App\Http\Requests\StoreUpdateAmentiesRequest;
use App\Http\Resources\AmenityResource;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amenities = Amenity::all();
        return (new AmenityResource($amenities));
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
    public function store(StoreAmentiesRequest $request)
    {
        $amenity = Amenity::create([
            'name' => $request->name,
            'svg_icon' => $request->svg_icon
        ]);
        return (new AmenityResource($amenity));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
    public function update(StoreUpdateAmentiesRequest $request, string $id)
    {
        $amenty = Amenity::find($id);
        $amenty->name = $request->name;
        $amenty->svg_icon = $request->svg_icon;
        $amenty->save();
        return (new AmenityResource($amenty));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $amenty = Amenity::find($id);
        $amenty->delete();
        return (new AmenityResource($amenty));
    }
}
