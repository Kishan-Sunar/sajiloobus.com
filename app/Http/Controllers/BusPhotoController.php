<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowBusPhotoRequest;
use App\Http\Requests\StoreBusPhotoRequest;
use App\Http\Resources\BusPhotoResource;
use App\Models\BusPhoto;
use Illuminate\Http\Request;

class BusPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function showGallery(string $bus_no)
    {
        $busPhoto = BusPhoto::all()->where('bus_no', $bus_no)->sortByDesc('created_at');
        return (new BusPhotoResource($busPhoto));
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
    public function store(StoreBusPhotoRequest $request)
    {
        $busPhoto = BusPhoto::create([
            'title' => $request->title,
            'bus_no' => $request->bus_no,
        ]);
        if ($busPhoto && $request->hasFile('photo_path')) {
            $image = $request->file('photo_path');
            $featuredPhoto = $image->storePublicly('bus-photos', 'public');
            $busPhoto->photo_path = $featuredPhoto;
            $busPhoto->save();
        }
        return (new BusPhotoResource($busPhoto))->additional([
            "message" => "Bus photo added successfully"
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
        $busPhoto = BusPhoto::find($request->id);
        $busPhoto->title = $request->title;
        $busPhoto->photo_path = $request->photo_path;
        return (new BusPhotoResource($busPhoto))->additional([
            "message" => "Bus photo updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $busPhoto = BusPhoto::find($id);
        $busPhoto->delete();
        return (new BusPhotoResource($busPhoto))->additional([
            "message" => "Bus photo deleted successfully"
        ]);
    }
}
