<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use App\DataTables\LandlordsDataTable;
use View;
use Validator;
use Redirect;
use Storage;
use File;

class LandlordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request){
        $validator = Validator::make($request->all(), Landlord::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if ($validator->passes()) {
            $path = Storage::putFileAs('images/landlord', $request->file('imagePath'),$request->file('imagePath')->getClientOriginalName());

            $request->merge(["imagePath"=>$request->file('imagePath')->getClientOriginalName()]);

            $user = new User([
                'name' => $request->input('first_name').' '. $request->last_name,
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            $user->role = 'landlord';
            $user->save();

            if($file = $request->hasFile('imagePath')) {
                $advisor = new Landlord;
                $advisor->user_id = $user->id;
                $advisor->first_name = $request->first_name;
                $advisor->last_name = $request->last_name; 
                $advisor->address = $request->address;
                $advisor->phone = $request->phone; 
                
                $file = $request->file('imagePath') ;
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/images' ;
                $advisor->imagePath = 'images/'.$fileName;            
                $advisor->save();
                $file->move($destinationPath,$fileName);

                // return Redirect::to('/profie')->with('success','New Customer has been Added!');
                // return redirect()->route('tenant.profile');
                return redirect()->back();
            } 

        }     
    }
    public function getLandlords(LandlordsDataTable $dataTable) {
        $landlords = Landlord::with('properties', 'users')->get();
        // $landlords = Landlord::with('properties', 'users')->orderBy('id','DESC');

        return $dataTable->render('landlord.index',compact('landlords'));
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
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function show(Landlord $landlord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function edit(Landlord $landlord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Landlord $landlord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Landlord  $landlord
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $landlord = Landlord::findOrFail($id);
        $Landlord = Landlord::find($id);
        User::where('id',$Landlord->user_id)->forceDelete();
        Property::where('landlord_id',$Landlord->id);
        $Landlord->forceDelete();

        return Redirect::route('getLandlords')->with('danger','Landlord has been Deleted!');
    }

    public function deactivate($id){
        $Landlord = Landlord::find($id);
        Property::where('landlord_id',$Landlord->id)->delete();
        User::where('id',$Landlord->user_id)->delete();
        $Landlord->delete();
        
        return Redirect::route('getLandlords')->with('warning','Landlord has been Deactivated!');
    }

    public function restore($id) {
        $landlord = Landlord::withTrashed()->find($id);
        User::where('id',$landlord->user_id)->restore();
        Property::where('landlord_id',$landlord->id)->restore();
        $landlord->restore(); 
        return Redirect::route('getLandlords')->with('success','Landlord has been Restored!');
    }
}