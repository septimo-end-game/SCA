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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createuser', function () {
	return view('createuser');
});


// Administradores

Route::resource('admins','AdminControler');

// seguridad

Route::resource('elementos','ElementosControler');

// seguridad

Route::resource('empleados','EmpleadosController');