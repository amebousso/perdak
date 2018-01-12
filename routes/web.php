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
    return view('login');
});

Route::get('/admin', function () {
    return view('welcome');
});

Route::resource('employes', 'EmployeController');
Route::resource('banques', 'BanqueController');
Route::resource('communes', 'CommuneController');
Route::resource('circuits', 'CircuitController');
Route::resource('coordinationDepartementales', 'CoordinationDepartementaleController');
Route::resource('coordinationPoles', 'CoordinationPoleController');
Route::resource('services', 'ServiceController');
Route::resource('cellules', 'CelluleController');
Route::resource('corpsMetier', 'CorpsMetierController');
Route::resource('fonctions', 'FonctionController');

Route::get('/celluleService/{id}', 'EmployeController@celluleService');
Route::get('/fonctionCorps/{id}', 'EmployeController@fonctionCorps');
Route::get('/departementPole/{id}', 'EmployeController@departementPole');
Route::get('/communesDpt/{id}', 'EmployeController@communeDepartement');
Route::get('/circuitCommune/{id}', 'EmployeController@circuitCommune');
