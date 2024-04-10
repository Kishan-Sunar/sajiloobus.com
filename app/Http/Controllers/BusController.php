<?php

namespace App\Http\Controllers;

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
        $buses = Bus::all();
        return (new BusResource($buses, 'Added successfully'));
    }

    public function buses()
    {
        $buses = Bus::all();
        return (new BusResource($buses, 'Added successfully'));
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
            'bus_no'=> $request->bus_no,
            "name" => $request->name,
            "featured_photo_path" => $request->featured_photo_path,
            "operator_id" => $request->operator_id,
            "bus_type" => $request->bus_type
        ]);
        return (new BusResource($bus, 'Added successfully'))->additional([
            "message" => "Bus added successfully"
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
    public function update(Request $request, string $bus_no)
    {
        $bus = Bus::find($bus_no);
        $bus->name = $request->name;
        $bus->featured_photo_path = $request->featured_photo_path;
        $bus->operator_id = $request->operator_id;
        $bus->save();
        return (new BusResource($bus, 'updated successfully'))->additional([
            "message" => "Bus updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $bus_no)
    {
        $bus = Bus::find($bus_no);
        $bus->delete();
        return (new BusResource($bus, 'Deleted successfully'))->additional([
            "message" => "Bus deleted successfully"
        ]);
    }
}
