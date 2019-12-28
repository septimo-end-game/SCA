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

Route::get('empleados', 'HomeController@index')->name('empleados');

//Grupo de rutas con reglas de navegacion declaradas en middlewares que se encuentran en AdminMiddleware.php y Authenticate.php
//Route::middleware(['auth', 'admin'])->group(function (){
	//RUTAS DEL CRUD USUARIOS
	Route::get('/createuser', 'UsersControler@index');

	Route::get('/admins/create', 'ElementosControler@create'); //formulario de registro
	Route::post('/createuser', 'UsersControler@store'); //Envio de datos del formulario de registro
	// Administradores
	Route::resource('admins','AdminControler');
	// seguridad
	Route::resource('elementos','ElementosControler');
	// seguridad
	Route::resource('empleados','EmpleadosController');
//});
