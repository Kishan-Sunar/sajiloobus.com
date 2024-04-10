<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Resources\BusPhotoResource;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function allSchedules() {
        $schedule = Schedule::all();
        return (new ScheduleResource($schedule, 'Success'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        $schedule = Schedule::create([
            'name'=> $request->name,
            'origin'=> $request->origin,
            'departure'=> $request->departure,
            'destination'=> $request->destination,
            'arrival'=> $request->arrival,
            'bus_no'=> $request->bus_no,
            'policy'=> $request->policy,
            'notes'=> $request->notes,
        ]);
        return (new ScheduleResource($schedule, 'Added successfully'))->additional([
            "message" => "Schedule added successfully"
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
        $schedule = Schedule::find($request->id);
        $schedule->name = $request->name;
        $schedule->origin = $request->origin;
        $schedule->departure = $request->departure;
        $schedule->destination = $request->destination;
        $schedule->arrival = $request->arrival;
        $schedule->bus_no = $request->bus_no;
        $schedule->policy = $request->policy;
        $schedule->notes = $request->notes;
        return (new ScheduleResource($schedule, 'Updated successfully'))->additional([
            "message" => "Updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return (new BusPhotoResource($schedule, 'Deleted successfully'))->additional([
            "message" => "Deleted successfully"
        ]);
    }
}
