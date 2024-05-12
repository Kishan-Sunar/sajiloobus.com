<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBusFeaturedPhotoRequest;
use App\Http\Requests\StoreBusRequest;
use App\Http\Resources\BusResource;
use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Bus::with("BusType", "BusPhoto")->get();
        return (new BusResource($buses));
    }

    public function busByOperator($operator_id)
    {
        $bus = Bus::with("BusType", "BusPhoto")->where('operator_id', $operator_id)->get();
        return (new BusResource($bus))->additional([
            "message" => "Bus fetched successfully"
        ]);
    }

    public function buses(Request $request)
    {
        $buses = Bus::where("operator_id", $request->id);
        return (new BusResource($buses));
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
    public function store(StoreBusRequest $request)
    {
        $bus = Bus::create([
            'bus_no' => $request->bus_no,
            "name" => $request->name,
            "operator_id" => $request->operator_id,
            "bus_type" => $request->bus_type
        ]);
        return response()->json(['data' => 'added successfully'], 200);
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
    public function update(Request $request, string $bus_no)
    {
        $bus = Bus::where("bus_no", $bus_no)->first();
        $bus->name = $request->name;
        $bus->bus_type = $request->bus_type;
        $bus->operator_id = $request->operator_id;
        $bus->save();
        return response()->json(['data' => 'updated successfully'], 200);
    }

    public function updateBusPhoto(StoreBusFeaturedPhotoRequest $request)
    {
        $bus = Bus::where("bus_no", $request->bus_no)->first();
        if ($bus && $request->hasFile('featured_photo_path')) {
            $image = $request->file('featured_photo_path');
            $featuredPhoto = $image->storePublicly('bus-photos', 'public');
            $bus->featured_photo_path = $featuredPhoto;
            $bus->save();
        }
        return response()->json(['data' => 'updated successfully'], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $bus_no)
    {
        $bus = Bus::find($bus_no);
        $bus->delete();
        return response()->json(['data' => 'deleted successfully'], 200);
    }
}
