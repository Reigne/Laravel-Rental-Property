<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use Auth;

class ReviewController extends Controller
{   
    //store comment of tenant
    public function store(Request $request)
    {   
        //check if someone is login
        if (Auth::check()) {

            //check if user already have a review
            $reviews = Review::where('property_id', $request->property_id)
                ->where('user_id', Auth::user()->id)
                ->first();

            //validate the comment
            $this->validate($request, [
                'comment' => 'required|profanity'
            ]);
            
            //if tenant already have comment then it will only update the comment
            if ($reviews) {
                $reviews->comment = $request->comment;
                $reviews->save();
            } 
            
            //else when user doesn't comment yet
            else {
                $reviews = new Review;
                $reviews->user_id = Auth::user()->id;
                $reviews->property_id = $request->property_id;
                $reviews->comment = $request->comment;
                $reviews->save();
            }

            return redirect()->back()->with('success', 'Thanks for the review!');

        } 

        //else when no one is login
        else {
            return redirect()->back()->with('warning', 'Please sign-in first.');
        }
    }
}
