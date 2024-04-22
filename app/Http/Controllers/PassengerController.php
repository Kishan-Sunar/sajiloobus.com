<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Requests\StorePassengerRequest;
use App\Http\Requests\StoreProfileUpdateRequest;
use App\Http\Resources\PassengerResource;
use App\Http\Resources\UserResource;
use App\Models\Passenger;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class PassengerController extends Controller
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
    public function store(StorePassengerRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => UserRole::PASSENGER,
            'status' => UserStatus::ACTIVE,
            'profile_photo_path' => $request->profile_photo_path
        ]);
        $passenger = Passenger::create([
            'user_id' => $user->id,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'address' => $request->address
        ]);
        $accessToken = $user->createToken('accessToken');
        return (new UserResource($user))->additional(
            [
                'accessToken' => $accessToken->plainTextToken,
                'is_verified' => $user->hasVerifiedEmail(),
            ]
        );
    }


    public function authGoogle(Request $request)
    {
        if (User::where('provider_id', $request->authuser)->exists()) {
            $user = User::where('provider_id', $request->authuser)->first();
            $accessToken = $user->createToken('accessToken');
            return (new UserResource($user))->additional(
                [
                    'accessToken' => $accessToken->plainTextToken,
                    'is_verified' => $user->hasVerifiedEmail(),
                ]
            );
        } else {
            if ($request->hasFile('profile_photo')) {
                $image = $request->file('profile_photo');
                $profile = $image->storePublicly('profiles', 'public');
            }
            $user = User::create([
                'name' => $request->name,
                'full_name' => $request->name,
                'email' => $request->email,
                'provider' => 'Gmail',
                'provider_id' => $request->authuser,
                'password' => Hash::make('password'),
                'profile_photo_path' => $profile ?? null,
                'role' => UserRole::PASSENGER,
                'status' => UserStatus::ACTIVE,
            ]);
            $passenger = Passenger::create([
                'user_id' => $user->id,
            ]);
            $accessToken = $user->createToken('accessToken');
            return (new UserResource($user))->additional(
                [
                    'accessToken' => $accessToken->plainTextToken,
                    'is_verified' => $user->hasVerifiedEmail(),
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $passenger = Passenger::where('user_id', $id)->first();
        $user = User::find($id);
        return (new PassengerResource($passenger))->additional(['user' => $user]);
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
    public function update(StoreProfileUpdateRequest $request, int $id)
    {
        $user = User::find($id);
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->save();
        $passenger = Passenger::where('user_id', $user->id)->first();
        $passenger->gender = $request->gender;
        $passenger->contact = $request->contact;
        $passenger->address = $request->address;
        if ($request->dob) {
            $passenger->dob = new Carbon($request->dob);
        }
        $passenger->save();
        return (new UserResource($user))->additional([
            "message" => "Updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
