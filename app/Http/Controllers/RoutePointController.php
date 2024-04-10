<?php

namespace App\Http\Controllers;

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


    public function allRoutePoints() {
        $point = RoutePoint::all();
        return (new RoutePointResource($point, 'Success'));
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
    public function store(Request $request)
    {
        $point = RoutePoint::create([
            'schedule_id'=> $request->schedule_id,
            'location_id'=> $request->location_id,
            'type'=> $request->type,
        ]);
        return (new RoutePointResource($point, 'Added successfully'))->additional([
            "message" => "Route point added successfully"
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
        $point = RoutePoint::find($request->id);
        $point->schedule_id = $request->schedule_id;
        $point->location_id = $request->location_id;
        $point->type = $request->type;
        return (new RoutePointResource($point, 'Updated successfully'))->additional([
            "message" => "Updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $point = RoutePoint::find($id);
        $point->delete();
        return (new RoutePointResource($point, 'Deleted successfully'))->additional([
            "message" => "Deleted successfully"
        ]);
    }
}
