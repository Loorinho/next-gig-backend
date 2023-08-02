<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;
use phpseclib3\Crypt\RC2;

class GigController extends Controller
{
    public function createGig(Request $request)
    {
        $gig = Gig::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'price' => $request->price,
            'date'=> $request->date
        ]);

        return response()->json([
            'message'=> $gig->title .' gig created successfully',
            'gig'=>$gig
        ],200);
    }

    public function listGigs()
    {
        $gigs = Gig::all();

        return response()->json([
            'gigs' => $gigs
        ],200);
    }

    public function getGig($id)
    {
        $gig = Gig::find($id);

        return response()->json([
            'gig' => $gig
        ], 200);
    }

   
}
