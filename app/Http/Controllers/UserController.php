<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $password = Hash::make($request->password);
        // $user = User::create([]);
        return response()->json([
            'message' => $password
        ]);
    }

    public function login(Request $request)
    {
        $user = User::create([]);
    }

    public function gigs()
    {
        $users = User::all()->load('gigs');
        return response()->json([
            'message' => $users
        ]);
    }
}
