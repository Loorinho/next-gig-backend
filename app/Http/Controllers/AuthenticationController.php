<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    
    public function register(Request $request)
    {
        // $password = bcrypt($request->password);
        $password = Hash::make($request->password);

        $user = User::create([
            'email' => $request->email,
            'password' => $password,
            'name' => $request->name
        ]);
   
        $accessToken = $user->createToken('access_token')->accessToken;      
        return response(['message' => 'User created successfully', 'access_token' => $accessToken]);
    }

    public function login(Request $request)
    {
        $user = User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json([
                'message' => 'Invalid login credentials'
            ]);
        }
        $accessToken = $user->createToken('access_token')->accessToken;
        return response()->json(['message' => 'Logged in successfully', 'access_token' => $accessToken]);
    }
}
