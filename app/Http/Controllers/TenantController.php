<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

use View;
use Validator;
use Redirect;
use Storage;
use File;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function register(Request $request){
        $validator = Validator::make($request->all(), Tenant::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if ($validator->passes()) {
            $path = Storage::putFileAs('images/tenant', $request->file('imagePath'),$request->file('imagePath')->getClientOriginalName());

            $request->merge(["imagePath"=>$request->file('imagePath')->getClientOriginalName()]);

            $user = new User([
                'name' => $request->input('fname').' '. $request->lname,
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            $user->role = 'tenant';
            $user->save();

            if($file = $request->hasFile('imagePath')) {
                $tenant = new Tenant;
                $tenant->user_id = $user->id;
                $tenant->first_name = $request->first_name;
                $tenant->last_name = $request->last_name; 
                $tenant->address = $request->address;
                $tenant->phone = $request->phone; 
                
                $file = $request->file('imagePath') ;
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/images' ;
                $tenant->imagePath = 'images/'.$fileName;            
                $tenant->save();
                $file->move($destinationPath,$fileName);


                // return Redirect::to('/profie')->with('success','New Customer has been Added!');
                // return redirect()->route('tenant.profile');
                return redirect()->back();
            } 

        }     
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
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }

}
