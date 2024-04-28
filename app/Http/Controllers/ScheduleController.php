<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Resources\BusPhotoResource;
use App\Http\Resources\ScheduleResource;
use App\Models\Bus;
use App\Models\Location;
use App\Models\Schedule;
use Carbon\Carbon;
use Carbon\Traits\ToStringFormat;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function searchSchedules(Request $request)
    {
        $origin = $request->from;
        $destination = $request->to;
        $date = Carbon::createFromFormat('d/m/Y', $request->date)->toDateString();
        $origin_id = Location::where('name', $origin)->first();
        $destination_id = Location::where('name', $destination)->first();
        $schedules = Schedule::where('origin', $origin_id->id)
            ->where('destination', $destination_id->id)
            ->where('departure', '>=', $date)
            ->get();
        if ($schedules) {
            return (new ScheduleResource($schedules));
        } else {
            return response()->json(['data' => 'No schedules found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function allSchedules()
    {
        $schedule = Schedule::all();
        return (new ScheduleResource($schedule));
    }

    public function scheduleByOperator($operator_id)
    {
        $bus_no = Bus::where('operator_id', $operator_id)->pluck('bus_no');
        $schedule = Schedule::whereIn('bus_no', $bus_no)->get()->sortBy('created_at');
        return (new ScheduleResource($schedule));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        $dept = Carbon::parse($request->departure)->toDateTime();
        $arr = Carbon::parse($request->arrival)->toDateTime();
        $schedule = Schedule::create([
            'name' => $request->name,
            'origin' => $request->origin,
            'departure' => $dept,
            'destination' => $request->destination,
            'arrival' => $arr,
            'bus_no' => $request->bus_no,
            'fare' => $request->fare,
            'policy' => $request->policy,
            'notes' => $request->notes,
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
    public function update(Request $request, int $id)
    {
        $dept = Carbon::parse($request->departure)->toDateTime();
        $arr = Carbon::parse($request->arrival)->toDateTime();
        $schedule = Schedule::find($id);
        $schedule->name = $request->name;
        $schedule->origin = $request->origin;
        $schedule->departure = $dept;
        $schedule->destination = $request->destination;
        $schedule->arrival = $arr;
        $schedule->bus_no = $request->bus_no;
        $schedule->policy = $request->policy;
        $schedule->notes = $request->notes;
        $schedule->save();
        return response()->json(['data' => 'Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return
            response()->json(['data' => 'Deleted successfully'], 200);
    }
}
