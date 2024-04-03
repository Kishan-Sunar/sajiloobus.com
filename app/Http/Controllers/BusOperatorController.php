<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Requests\StoreOperatorRequest;
use App\Http\Resources\UserResource;
use App\Models\BusOperator;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BusOperatorController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOperatorRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> UserRole::OPERATOR,
            'status'=> UserStatus::ACTIVE,
            'profile_photo_path'=> $request->profile_photo_path
        ]);
        $operator = BusOperator::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'contact' => $request->contact
        ]);
        $accessToken = $user->createToken('accessToken');
        return (new UserResource($user, 'SignUp successfully'))->additional(
            [
                'accessToken' => $accessToken->plainTextToken,
                'is_verified' => $user->hasVerifiedEmail(),
            ]
        );
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
    public function destroy(string $id)
    {
        //
    }
}
