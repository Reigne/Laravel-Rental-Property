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
            $name = auth()->user()->name;
            if (auth()->user()->role === 'tenant') {
                return redirect()->route('getTenants')->with('success', 'Welcome, ' . $name. '');
            } else if (auth()->user()->role === 'landlord') {
                // return redirect()->route('getEmployees');
                return redirect()->route('getLandlords')->with('success', 'Welcome, ' . $name. '');
            } else {
                dd($request->password);
                // return redirect()->route('shop.index');
            }
        } else {
            return redirect()->back()->with('error', 'Email-Address or Password Are Wrong.');
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