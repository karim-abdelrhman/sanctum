<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerUser;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(registerUser $request)
    {
        $data = $request->validated();
        $user = User::where('email' , $data['email'])->first();
        if(!Hash::check($data['password'] , $user->password)){
            return response()->json(['error' => 'Your credentials does not matching our accords']);
        }
        $token = $user->createToken($user->name);
        return response()->json([
            'user' => $user ,
            'token' => $token->plainTextToken
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return \response()->json(['msg' => 'Successfully Logout']);
    }
}
