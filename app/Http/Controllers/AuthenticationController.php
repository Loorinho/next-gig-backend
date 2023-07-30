<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    
    public function register(Request $request)
    {
        $password = bcrypt($request->password);

        $user = User::create([
            'email' => $request->email,
            'password' => $password,
            'name' => $request->name
        ]);
   
        $accessToken = $user->createToken('access_token')->accessToken;      
        return response(['message' => 'User created successfully', 'access_token' => $accessToken]);
    }
}
