<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

// use Session;

class LoginController extends Controller
{
    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email| required',
            'password' => 'required| min:8'
        ]);

        if (auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {
            if (auth()->user()->role === 'tenant') {
                return redirect()->route('getTenants');
            } else if (auth()->user()->role === 'landlord') {
                // return redirect()->route('getEmployees');
                dd($request->email);
            } else {
                dd($request->password);
                // return redirect()->route('shop.index');
            }
        } else {
            return redirect()->route('user.signin')->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
    public function logout()
    {
        Auth::logout();
        // Session::forget('cart');
        // return redirect()->route('user.signin');
        return redirect()->back();
    }
}