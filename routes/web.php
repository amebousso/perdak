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

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('login');
});

Route::get('/accueil', 'AccueilController@index');

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
Route::resource('users', 'UserController');

Route::get('/celluleService/{id}', 'EmployeController@celluleServices');
Route::get('/fonctionCorps/{id}', 'EmployeController@fonctionsCorps');
Route::get('/departementPole/{id}', 'EmployeController@departementPoles');
Route::get('/communesDpt/{id}', 'EmployeController@communeDepartements');
Route::get('/circuitCommune/{id}', 'EmployeController@circuitCommunes');

Auth::routes();

Route::get('/auth/login', 'Auth\LoginController@getLogin');
Route::post('/auth/login', 'Auth\LoginController@postLogin');
Route::get('/auth/logout', 'Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/employe/sousdossier', 'EmployeController@sousDossier');
Route::post('/employe/sousdossier', 'EmployeController@sousDossier');
Route::post('/employe/{id}', 'EmployeController@afficherEmploye');
Route::get('/employe/{id}', 'EmployeController@afficherEmploye');
