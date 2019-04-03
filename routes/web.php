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
    return view('welcome');
});

Route::get('agung', function () {
    return view('template.header');
});

// Route::get('user', 'UserController@index');
// Route::post('user', 'UserController@store');
// Route::post('user/{id}/edit', 'UserController@edit');
// Route::get('user/{id}', 'UserController@show');
// Route::put('user/{id}', 'UserController@update');
// Route::delete('user/{id}', 'UserController@update');

// Route::get('foo', function () {
//     $data['header'] = "HEADER";
//     return view('template.header',$data);
// });

Route::resource('pegawai','PegawaiController')->except([
    'update', 'destroy'
]);
Route::post('pegawai-update/{id}','PegawaiController@update');
Route::get('pegawai-delete/{id}','PegawaiController@destroy');

// ANAK
Route::resource('anak','AnakController')->except([
    'update', 'destroy'
]);
Route::post('anak-update/{id}','AnakController@update');
Route::get('anak-delete/{id}','AnakController@destroy');