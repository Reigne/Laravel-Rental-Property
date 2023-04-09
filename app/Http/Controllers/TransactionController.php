<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use App\Models\Property;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

use App\DataTables\OrdersDataTable;
use View;
use Validator;
use Redirect;
use Storage;
use File;
use Auth;
use DB;
use Carbon\Carbon;

class TransactionController extends Controller
{   

    //show the page of transaction process
    public function show($id){
        $property = Property::with('landlords')->where('id', $id)->get();

        return view('property.transaction', compact('property'));
    }

    //tenant request to landlord to rent the property
    public function requestProperty(Request $request){
        if(Auth::check()) {
            $id = $request->property_id;
            $property = Property::findOrFail($id);
            try {
                DB::beginTransaction();
                $order = new Order();
                $order->tenant_id = Auth::user()->tenants->id;
                $order->total_days = $request->total_days;
                $order->payment_method = $request->paymentRadio;
                $order->total_amount = $order->total_days * $property->rent;
                $order->save();

                $order->properties()->attach($property->id);
            } catch (\Exception $e) {
                dd($e);
                DB::rollback();
                return redirect()->back()->with('error', $e->getMessage());
            } 

            DB::commit();
            return redirect()->back()->with('success','Request has been sent to Landlord!');
        }
        else {
            return redirect()->back()->with('warning','Please login first!');
        }
    }

    //get the index of transaction
    public function getTransaction() {

        $AuthId = Auth::user()->landlords->id;
        $orderinfo = DB::table('orderinfo')
        ->select('orderinfo.*', 'properties.id as property_id', 'properties.imagePath as property_image', 'properties.address', 'properties.city', 'properties.state', 'tenants.last_name', 'tenants.first_name', 'users.email', 'tenants.imagePath')
        ->join('orderline', 'orderline.orderinfo_id', '=', 'orderinfo.id')
        ->join('tenants','tenants.id','=','orderinfo.tenant_id')
        ->join('properties','properties.id','=','orderline.property_id')
        ->join('users', 'users.id', '=' ,'tenants.user_id')
        ->join('landlords', 'landlords.id', '=', 'properties.landlord_id')
        ->where('landlords.id', '=', $AuthId)
        ->orderBy('id')
        ->paginate(10);

        return view('transaction.index', compact('orderinfo'));
    }

    //edit the status of orderinfo that requested by tenant
    //landlord will accept or canceled the request
    public function editStatus(Request $request, $id){

        $orderinfo = Order::findOrFail($id);
        
        //if landlord accept the request
        if($request->status == 'Accepted'){
            $orderinfo->start_date = Carbon::now();
            $orderinfo->end_date =  Carbon::now()->addDays($orderinfo->total_days);
            $orderinfo->status = $request->status; 
            $orderinfo->update();
        } 
        //if landlord canceled the request
        elseif($request->status == 'Canceled'){
            $orderinfo->status = $request->status; 
            $orderinfo->update();
        }

        return redirect()->back()->with('success', 'Status updated successfully');
    }
}
