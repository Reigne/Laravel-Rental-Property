<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/base', function () {
    return view('layouts.base');
});

// tenant
// Route::post('/register-tenant', 'TenantController@register');
Route::post('/register-tenant', [
    'uses' => 'TenantController@register',
     'as' => 'regtenant'
  ]);