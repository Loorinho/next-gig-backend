<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;

class GigController extends Controller
{
    public function createGig(Request $request)
    {
        $gig = Gig::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'price' => $request->price,
        ]);

        return response()->json([
            'message'=> $gig->title .' gig created successfully'
        ]);
    }

    public function listGigs(Request $request)
    {
        $gigs = Gig::all();

        return response()->json([
            'gigs' => $gigs
        ]);
    }

   
}
