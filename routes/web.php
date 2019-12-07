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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'administrador'])->namespace('Administrador')->group(function () {

	//Rooms
	Route::get('/rooms', 'RoomController@index');
	Route::get('/rooms/create', 'RoomController@create'); //registro
	Route::get('/rooms/{room}/edit', 'RoomController@edit');
	Route::post('/rooms', 'RoomController@store'); //envio del formulario
	Route::put('/rooms/{room}', 'RoomController@update');
	Route::delete('/rooms/{room}', 'RoomController@destroy');

	//Shifts
	Route::get('/shifts', 'ShiftController@index');
	Route::get('/shifts/create', 'ShiftController@create'); //registro
	Route::get('/shifts/{shift}/edit', 'ShiftController@edit');
	Route::post('/shifts', 'ShiftController@store'); //envio del formulario
	Route::put('/shifts/{shift}', 'ShiftController@update');
	Route::delete('/shifts/{shift}', 'ShiftController@destroy');

	//USERS
	Route::resource('users', 'UserController');

	//PATIENT
	Route::resource('patients', 'PatientController');

	//CHARTS

	Route::get('/charts/orders/line', 'ChartController@orders');

	Route::get('user-list-excel', 'UserController@exportExcel')->name('users.excel');

});

Route::middleware(['auth', 'doctor'])->namespace('Doctor')->group(function () {

	//FORMATS
	Route::resource('medicals', 'MedicalController');

	Route::resource('nurses', 'NurseController');

	Route::resource('evolutions', 'EvolutionController');

	Route::resource('orders', 'OrderController');

	Route::get('/orders/{order}/impresion', 'OrderController@showPdf');

});

