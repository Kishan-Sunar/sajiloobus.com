<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBusTypeRequest;
use App\Http\Resources\BusTypeResource;
use App\Models\Amenity;
use App\Models\BusType;
use Illuminate\Http\Request;

class BusTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $busTypes = BusType::all();
        return BusTypeResource::collection($busTypes);
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
    public function store(StoreBusTypeRequest $request)
    {
        $busType = BusType::create([
            'name' => $request->name,
            'model' => $request->model,
            'company' => $request->company,
            'type' => $request->type,
            'operator_id' => $request->operator_id,
            'grid_size' => $request->grid_size,
        ]);
        return (new BusTypeResource($busType))->additional([
            "message" => "Bus type added successfully"
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
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBusTypeRequest $request, int $id)
    {
        $busType = BusType::find($id);
        $busType->name = $request->name;
        $busType->model = $request->model;
        $busType->company = $request->company;
        $busType->type = $request->type;
        $busType->grid_size = $request->grid_size;
        $busType->save();
        return (new BusTypeResource($busType, 'Updated successfully'))->additional([
            "message" => "Bus type updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $busType = BusType::find($id);
        $busType->delete();
        return (new BusTypeResource($busType))->additional([
            "message" => "Bus type deleted successfully"
        ]);
    }
}
