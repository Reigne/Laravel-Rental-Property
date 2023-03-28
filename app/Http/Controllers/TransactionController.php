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

class TransactionController extends Controller
{
    public function show($id){
        $property = Property::with('landlords')->where('id', $id)->get();

        return view('property.transaction', compact('property'));
    }

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
                $order->save();
                $totals = $order->total_days * $property->rent;
                
                $order->properties()->attach($property->id, ['total_amount' => $totals]);
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

    public function getTransaction(OrdersDataTable $dataTable) {
        // $orderinfo = Order::join('orderline', 'orderline.orderinfo_id', '=', 'orderinfo.id')
        // ->join('tenants','tenants.id','=','orderinfo.tenant_id')
        // ->join('properties','properties.id','=','orderline.property_id')
        // ->select('orderinfo.*', 'properties.id as property_id', 'tenants.last_name')
        // ->get();
        $orderinfo = Order::with(['properties', 'tenants'])->get();
        dd($orderinfo);

        return $dataTable->render('transaction.index');
    }
}
