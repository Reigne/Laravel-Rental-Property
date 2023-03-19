<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\Property;
use Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {

            //check if user already have a review
            $reviews = Review::where('property_id', $request->property_id)
                ->where('user_id', Auth::user()->id)
                ->first();

            $this->validate($request, [
                'comment' => 'required'
            ]);

            if ($reviews) {
                //update comment when already have
                $reviews->comment = $request->comment;
                $reviews->save();
            } else {
                //store comment when user doesn't comment yet
                $reviews = new Review;
                $reviews->user_id = Auth::user()->id;
                $reviews->property_id = $request->property_id;
                $reviews->comment = $request->comment;
                $reviews->save();
            }

            return redirect()->back()->with('success', 'Thanks for the review!');

        } 
        else {
            return redirect()->back()->with('warning', 'Please sign-in first.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
