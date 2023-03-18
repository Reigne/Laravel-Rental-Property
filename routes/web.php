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

// Route::get('/home', function () {
//     return view('homepage');
// });

Route::get('/base', function () {
    return view('layouts.base');
});

// Dashboard ====================================================================
Route::get('/dashboard', [
    'uses' => 'PropertyController@getDashboard',
    'as' => 'getDashboard'
]);

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

Route::get('/tenant-profile', [
    'uses' => 'TenantController@profile',
    'as' => 'tenant.profile',
]);

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

Route::get('/landlord-profile', [
    'uses' => 'LandlordController@profile',
    'as' => 'landlord.profile',
]);


Route::get('/my-properties', [
    'uses' => 'LandlordController@myProperties',
    'as' => 'landlord.properties'
]);

// Property ====================================================================
Route::resource('property', 'PropertyController');

Route::get('/property', [
    'uses' => 'PropertyController@getProperties',
    'as' => 'getProperties'
]);

Route::post('/create-property', [
    'uses' => 'PropertyController@store',
    'as' => 'getProps'
]);

Route::delete('/property/deactivate/{id}', [
    'uses' => 'PropertyController@deactivate',
    'as' => 'property.deactivate'
]);

Route::get('/property/restore/{id}', [
    'uses' => 'PropertyController@restore',
    'as' => 'property.restore'
]);

Route::post('/property/approved/{id}', [
    'uses' => 'PropertyController@approval',
    'as' => 'property.approved'
]);

Route::post('/property/available/{id}', [
    'uses' => 'PropertyController@available',
    'as' => 'property.available'
]);

Route::post('/property/taken/{id}', [
    'uses' => 'PropertyController@taken',
    'as' => 'property.taken'
]);

Route::get('/property/edit/{id}', [
    'uses' => 'PropertyController@edit',
    'as' => 'editProperty'
]);

Route::get('/property/{id}', [
    'uses' => 'PropertyController@show',
    'as' => 'showProperty'
]);

// transaction ====================================================================

Route::get('/transaction/property-{id}', [
    'uses' => 'TransactionController@show',
    'as' => 'showTransaction'
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