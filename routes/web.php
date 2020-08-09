<?php

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('customer', 'CustomerController');
    Route::get('changeAddress', 'CustomerController@changeAddress')->name('customer.address');
    Route::resource('address', 'AddressController');
    Route::resource('user', 'UserController');
    Route::get('changeStatus', ['uses' => 'UserController@changeStatus', 'as' => 'user.changeStatus'] );
    Route::get('user/admin/{id}', ['uses' => 'UserController@makeAdmin', 'as' => 'user.admin']);
    Route::get('user/not-admin/{id}', ['uses' => 'UserController@not_admin', 'as' => 'user.not.admin']);
});
