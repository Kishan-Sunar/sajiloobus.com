<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\StorePasswordResetRequest;
use App\Http\Resources\PasswordResetResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Mail\ResetCodeMail;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $accessToken = $user->createToken('accessToken')->plainTextToken;
        return (new UserResource($user))->additional(
            [
                'access_token' => $accessToken,
                'is_verified' => $user->hasVerifiedEmail(),
            ]
        );
    }

    public function resetCode(StorePasswordResetRequest $request)
    {
        $token = str()->random(10);
        $resetCode = PasswordReset::where('email', $request->email)->first();
        if ($resetCode) {
            $resetCode->delete();
        }
        PasswordReset::create(['email' => $request->email, 'token' => $token]);
        $mailData = [
            'title' => 'Mail from sajiloobus.com',
            'token' => $token
        ];
        Mail::to($request->email)->send(new ResetCodeMail($mailData));
    }

    public function verifyCode(Request $request)
    {
        $verify = PasswordReset::where('token', $request->token)->first();
        if ($verify) {
            return (new PasswordResetResource($verify))->additional([
                'success' => true
            ]);
        } else {
            return response()->json(['success' => false], 404);
        }
    }

    public function ResetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return (new UserResource($user))->additional([
            'success' => true
        ]);
    }
}
