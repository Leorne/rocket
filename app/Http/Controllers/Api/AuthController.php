<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\TokenRequest;
use App\Http\Requests\Api\User\RegistrationRequest;
use App\Models\User\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registration(RegistrationRequest $request): JsonResponse
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $token = $user->createToken($user->email)->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    public function token(TokenRequest $request): JsonResponse
    {
        $request->validated();

        $login = $request->login;

        $user = User::orWhere('email', $login)->orWhere('phone', $login)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Credentials are incorrect'], 401);
        }

        return response()->json(['token' => $user->createToken($user->email)->plainTextToken]);
    }
}
