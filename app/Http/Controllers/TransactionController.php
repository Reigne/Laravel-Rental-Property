<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

use App\DataTables\PropertiesDataTable;
use View;
use Validator;
use Redirect;
use Storage;
use File;
use Auth;

class TransactionController extends Controller
{
    public function show($id){
        $property = Property::with('landlords')->where('id', $id)->get();

        return view('property.transaction', compact('property'));
    }
}
