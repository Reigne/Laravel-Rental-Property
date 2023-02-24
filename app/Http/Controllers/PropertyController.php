<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use App\Models\Property;
use Illuminate\Http\Request;

use App\DataTables\PropertiesDataTable;
use View;
use Validator;
use Redirect;
use Storage;
use File;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getProperties(PropertiesDataTable $dataTable) {
        return $dataTable->render('property.index');
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->forceDelete();

        return Redirect::route('getProperties')->with('danger','Property has been Deleted!');
    }

    public function deactivate($id){
        $property = Property::findOrFail($id);
        $property->delete();
        // dd($customer);
        
        return Redirect::route('getProperties')->with('warning','Property has been Deactivated!');
    }

    public function restore($id) {
        $property = Property::withTrashed()->find($id);
        $property->restore(); 
        return Redirect::route('getProperties')->with('success','Property has been Restored!');
    }
}