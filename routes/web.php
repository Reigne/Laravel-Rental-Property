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

Route::get('/home', function () {
    return view('homepage');
});

Route::get('/base', function () {
    return view('layouts.base');
});

// Tenant ====================================================================
// Route::post('/register-tenant', 'TenantController@register');
Route::resource('tenant', 'TenantController');

Route::post('/register-tenant', [
    'uses' => 'TenantController@register',
    'as' => 'regtenant'
]);

Route::get('/tenant', [
    'uses' => 'TenantController@getTenants',
    'as' => 'getTenants'
]);

// Route::get('/tenant/edit/{id}','TenantController@edit')->name('tenant.edit');

Route::get('/tenant/edit/{id}', [
    'uses' => 'TenantController@edit',
    'as' => 'editTenant'
]);

Route::delete('/tenant/deactivate/{id}', [
    'uses' => 'TenantController@deactivate',
    'as' => 'tenant.deactivate'
]);

Route::get('/tenant/restore/{id}', [
    'uses' => 'TenantController@restore',
    'as' => 'tenant.restore'
]);

// Route::get('/edit', function () {
//     return view('tenant.edit');
// });

// Landlord ====================================================================
Route::resource('landlord', 'LandlordController');
Route::post('/register-landlord', [
    'uses' => 'LandlordController@register',
    'as' => 'reglandlord'
]);

Route::get('/landlord', [
    'uses' => 'LandlordController@getLandlords',
    'as' => 'getLandlords'
]);

Route::delete('/landlord/deactivate/{id}', [
    'uses' => 'LandlordController@deactivate',
    'as' => 'landlord.deactivate'
]);

Route::get('/landlord/restore/{id}', [
    'uses' => 'LandlordController@restore',
    'as' => 'landlord.restore'
]);

// Property ====================================================================
Route::resource('property', 'PropertyController');
Route::get('/property', [
    'uses' => 'PropertyController@getProperties',
    'as' => 'getProperties'
]);

Route::delete('/property/deactivate/{id}', [
    'uses' => 'PropertyController@deactivate',
    'as' => 'property.deactivate'
]);

Route::get('/property/restore/{id}', [
    'uses' => 'PropertyController@restore',
    'as' => 'property.restore'
]);


// Signin/logout ====================================================================
Route::post('signin', [
    'uses' => 'LoginController@postSignin',
    'as' => 'user.signin',
]);

Route::get('logout', [
    'uses' => 'LoginController@logout',
    'as' => 'user.logout',
    'middleware' => 'auth'
]);