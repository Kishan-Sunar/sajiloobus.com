<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoutePointRequest;
use App\Http\Resources\RoutePointResource;
use App\Models\RoutePoint;
use Illuminate\Http\Request;

class RoutePointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function allRoutePoints()
    {
        $point = RoutePoint::all();
        return (new RoutePointResource($point));
    }

    public function routePointsBySchedule(int $schedule_id)
    {
        $point = RoutePoint::where('schedule_id', $schedule_id)->get();
        return (new RoutePointResource($point));
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
    public function store(StoreRoutePointRequest $request)
    {
        $point = RoutePoint::create([
            'schedule_id' => $request->schedule_id,
            'location_id' => $request->location_id,
            'type' => $request->type,
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
    public function update(Request $request, string $id)
    {
        $point = RoutePoint::find($request->id);
        $point->schedule_id = $request->schedule_id;
        $point->location_id = $request->location_id;
        $point->type = $request->type;
        return response()->json(['data' => 'updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $point = RoutePoint::find($id);
        $point->delete();
        return response()->json(['data' => 'deleted successfully'], 200);
    }
}
