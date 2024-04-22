<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfilePhotoRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updateProfilePhoto(StoreProfilePhotoRequest $request)
    {
        $user = User::find($request->user_id);
        if ($user && $request->hasFile('profile_photo')) {
            $image = $request->file('profile_photo');
            $profile = $image->storePublicly('profiles', 'public');
            $user->profile_photo_path = $profile;
            $user->save();
        }
        return (new UserResource($user))->additional([
            "message" => "Updated successfully"
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = User::find($request->user_id);
        $user->password = Hash::make($request->password);
        $user->save();
        return (new UserResource($user))->additional([
            "message" => "Updated successfully"
        ]);
    }
}
