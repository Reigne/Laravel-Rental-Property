<?php

namespace App\Http\Controllers;

use App\DataTables\PropertiesDataTable;
use App\Models\Landlord;
use App\Models\Property;
use App\Models\Review;
use App\Models\User;
use Auth;
use DB;
use File;
use Illuminate\Http\Request;
use Redirect;
use Storage;
use Validator;
use View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search_property(Request $req)
    {

        //if search rent, city and state is not null
        if ($req->rent != null && $req->city != null && $req->state != null) {
            $properties = Property::Where('rent', '<=', $req->rent)
                ->where([
                    ['is_taken', '=', 0],
                    ['is_approved', '=', 1],
                ])
                ->Where('city', '=', $req->city)
                ->whereBetween('rent', [$req->rent - 3000, $req->rent + 3000])
                ->get();
        } 

        //if search rent is not null
        elseif ($req->rent != null && $req->city == null && $req->state == null) {
            $properties = Property::where([
                ['is_taken', '=', 0],
                ['is_approved', '=', 1],
            ])->whereBetween('rent', [$req->rent - 3000, $req->rent + 3000])->get();
        } 
        
        //if search city is not null
        elseif ($req->rent == null && $req->city != null && $req->state == null) {
            $properties = Property::where([
                ['is_taken', '=', 0],
                ['is_approved', '=', 1],
            ])->where('city', '=', $req->city)->get();
        } 
        
        //if search state is not null
        elseif ($req->rent == null && $req->city == null && $req->state != null) {
            $properties = Property::where([
                ['is_taken', '=', 0],
                ['is_approved', '=', 1],
            ])->where('state', '=', $req->state)->get();
        } 
        
        //if search rent and city is not null
        elseif ($req->rent != null && $req->city != null && $req->state == null) {
            $properties = Property::where([
                ['is_taken', '=', 0],
                ['is_approved', '=', 1],
            ])->Where('city', '=', $req->city)->whereBetween('rent', [$req->rent - 3000, $req->rent + 3000])->get();
        } 
        
        //if search rent and state is not null
        elseif ($req->rent != null && $req->city == null && $req->state != null) {
            $properties = Property::where([
                ['is_taken', '=', 0],
                ['is_approved', '=', 1],
            ])->Where('state', '=', $req->state)->whereBetween('rent', [$req->rent - 3000, $req->rent + 3000])->get();
        } 
        
        //if search city and state is not null
        elseif ($req->rent == null && $req->city != null && $req->state != null) {
            $properties = Property::where([
                ['is_taken', '=', 0],
                ['is_approved', '=', 1],
            ])->Where('city', '=', $req->city)->Where('state', '=', $req->state)->get();
        } 

        //else when no input but they click search
        else {
            $properties = Property::where([
                ['is_taken', '=', 0],
                ['is_approved', '=', 1],
            ])->get();
        }

        //$states is for dropwdown in search
        $states = DB::table('properties')
            ->select('properties.state')
            ->groupBy('properties.state')
            ->whereNull('properties.deleted_at')
            ->get();

        return view('homepage', compact('properties', 'states'));

    }

    //get the datatable of properties
    public function getProperties(PropertiesDataTable $dataTable)
    {
        return $dataTable->render('property.index');
    }

    //create property by landlord
    public function store(Request $request)
    {   
        //check if landlord are upgraded or verified
        $user = Auth::user()->landlords->is_upgraded;

        if ($user == 1) {
            
            //validate all
            $validator = Validator::make($request->all(), Property::$rules);

            //if the validator failed then redirect with error
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            //if the validator passes then process data to store
            if ($validator->passes()) {
                $path = Storage::putFileAs('images/property', $request->file('imagePath'), $request->file('imagePath')->getClientOriginalName());

                $request->merge(["imagePath" => $request->file('imagePath')->getClientOriginalName()]);

                if ($file = $request->hasFile('imagePath')) {
                    $props = new Property;
                    $props->landlord_id = Auth::user()->landlords->id;
                    $props->area = $request->area;
                    $props->garage = $request->garage;
                    $props->bathroom = $request->garage;
                    $props->bedroom = $request->bedroom;
                    $props->rent = $request->rent;
                    $props->city = $request->city;
                    $props->state = $request->state;
                    $props->address = $request->address;
                    $props->description = $request->description;

                    $file = $request->file('imagePath');
                    $fileName = $file->getClientOriginalName();
                    $destinationPath = public_path() . '/images';
                    $props->imagePath = 'images/' . $fileName;
                    $props->save();
                    $file->move($destinationPath, $fileName);

                    return redirect()->back();
                }

            }
        } 
        
        //else if landlord not verified or upgraded
        else {
            return redirect()->back()->with('warning', 'Need to upgrade');
        }
    }

    public function show($id)
    {
        $property = Property::with('landlords')->where('id', $id)->get();

        $reviews = Review::join('users', 'users.id', '=', 'reviews.user_id')
            ->join('properties', 'properties.id', '=', 'reviews.property_id')
            ->join('tenants', 'tenants.user_id', '=', 'users.id')
            ->select('tenants.imagePath', 'users.name', 'reviews.created_at', 'reviews.comment')
            ->where('reviews.property_id', '=', $id)
            ->paginate(5);

        return view('property.show', compact('property', 'reviews'));
    }

    public function edit($id)
    {
        $property = Property::find($id);

        $landlord = Landlord::with('properties')->where('id', $property->landlord_id)->get();

        return view('property.edit', compact('property', 'landlord'));
    }

    public function update(Request $request, $id)
    {
        $props = Property::find($id);

        if ($file = $request->hasFile('imagePath')) {
            $path = Storage::putFileAs('images/property', $request->file('imagePath'), $request->file('imagePath')->getClientOriginalName());
            $request->merge(["imagePath" => $request->file('imagePath')->getClientOriginalName()]);

            $props->area = $request->area;
            $props->garage = $request->garage;
            $props->bathroom = $request->garage;
            $props->bedroom = $request->bedroom;
            $props->rent = $request->rent;
            $props->city = $request->city;
            $props->state = $request->state;
            $props->address = $request->address;
            $props->description = $request->description;

            $file = $request->file('imagePath');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/images';
            $props->imagePath = 'images/' . $fileName;
            $props->update();
            $file->move($destinationPath, $fileName);

            return redirect()->back()->with('success', 'Property is successfully updated!');
        } else {
            $props->area = $request->area;
            $props->garage = $request->garage;
            $props->bathroom = $request->garage;
            $props->bedroom = $request->bedroom;
            $props->rent = $request->rent;
            $props->city = $request->city;
            $props->state = $request->state;
            $props->address = $request->address;
            $props->description = $request->description;
            $props->update();
            return redirect()->back()->with('success', 'Property is successfully updated!');
        }
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->forceDelete();

        return Redirect::route('getProperties')->with('danger', 'Property has been Deleted!');
    }

    public function deactivate($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
        
        return Redirect::route('getProperties')->with('warning', 'Property has been Deactivated!');
    }

    public function restore($id)
    {
        $property = Property::withTrashed()->find($id);
        $property->restore();
        return Redirect::route('getProperties')->with('success', 'Property has been Restored!');
    }

    //// Dashboard
    public function getDashboard()
    {
        $properties = Property::withTrashed()
            ->where([
                ['is_taken', '=', 0],
                ['is_approved', '=', 1],
            ])->get();

        $states = DB::table('properties')
            ->select('properties.state')
            ->groupBy('properties.state')
            ->get();

        return view('homepage', compact('properties', 'states'));
    }

    public function approval(Request $request, $id)
    {
        $property = Property::withTrashed()->find($id);
        $property->is_approved = 1;
        $property->update();

        return redirect()->back()->with('success', 'Request post has been approved');
    }

    public function taken(Request $request, $id)
    {
        $property = Property::withTrashed()->find($id);
        $property->is_taken = 1;
        $property->update();

        return redirect()->back()->with('success', 'Your property is already taken');
    }

    public function available(Request $request, $id)
    {
        $property = Property::withTrashed()->find($id);
        $property->is_taken = 0;
        $property->update();

        return redirect()->back()->with('success', 'Your property is now available');
    }
}
