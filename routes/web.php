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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return "Cache cleared";
});

Route::get('/miseAjourTablePhoto', function(){
  $employes = App\Employe::whereBetween('id', [1219, 1575])->get();
  foreach ($employes as $employe) {
      $url = $employe->cni.'.png';

      $photo = new App\Photo;
      $photo->url = $url;
      $photo->extension = 'png';
      $photo->employe_id = $employe->id;
      $photo->save();
  }

  return ("Table photos mise a jour avec succes!!!");
});

Route::get('/admin', 'AccueilController@index');

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
Route::resource('fonctions', 'FonctionController');
Route::resource('users', 'UserController');

Route::get('/personnel/{type}', 'EmployeController@index');

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

Route::get('/appercu', 'EmployeController@appercuImprimer');
Route::post('/appercu', 'EmployeController@appercuImprimer');
Route::get('generatepdf', 'EmployeController@printPdf')->name('generatepdf');

Route::get('quickstat', 'AccueilController@quickStat');
Route::get('/recherche', 'AccueilController@recherche');
Route::post('/recherche', 'AccueilController@recherche');
