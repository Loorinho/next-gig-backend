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
            'date'=> $request->date,
            'user_id'=> $request->userId               
        ]);
        $gigs = Gig::all()->load("user");

        return response()->json([
            'message'=> $gig->title .' gig created successfully',
            'gig'=>$gig,
            'gigs'=>$gigs                           
        ],200);
    }

    // Listing all gigs
    public function listGigs()
    {
        $gigs = Gig::all()->load('user');

        return response()->json([
            'gigs' => $gigs
        ],200);
    }

    // Getting a single gig by ID
    public function getGig($id)
    {
        $gig = Gig::find($id)->load('user');

        return response()->json([
            'gig' => $gig
        ], 200);
    }

    // Deleting a gig
    public function getGig(Gig $gig)
    {
        $gig->delete();
        $gigs = Gig::all()->load('user');

        return response()->json([
            'message' => "Gig deleted successfully",
            'gigs' => $gigs                    
        ], 200);
    }

     public function editGig(Request $request)
    {
        $gig = Gig::where('id', $request->id)
                    ->get()
                    ->update([
                             'title' => $request->title,
                            'description' => $request->description,
                            'location' => $request->location,
                            'price' => $request->price,
                            'date'=> $request->date,
                            'user_id'=> $request->userId          
                    ]);

        $gigs = Gig::all()->load("user");

        return response()->json([
            'message'=> 'Gig updated successfully',
            // 'gig'=>$gig,
            'gigs'=>$gigs                           
        ],200);
    }

   
}
