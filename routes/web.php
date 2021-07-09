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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/planing','App\Http\Controllers\PlaningController@index')->name('planing');
Route::get('/resultat', 'App\Http\Controllers\RechercheController@resultat')->name('resultat');
Route::get('/rechercheclient', 'App\Http\Controllers\RechercheController@rechercheclient')->name('rechercheclient');
Route::get('/injoignable','App\Http\Controllers\ClientController@injoignableclient')->name('injoignable');
Route::resource('client','App\http\Controllers\ClientController');
Route::resource('marche','App\Http\Controllers\MarcheController');
Route::resource('motif','App\http\Controllers\MotifController');
Route::resource('consigne','App\Http\Controllers\ConsigneController');
Route::resource('technicien','App\http\Controllers\TechnicienController');
Route::resource('competence','App\http\Controllers\CompetenceController');
Route::resource('commune','App\Http\Controllers\CommuneController');
Route::resource('residence','App\Http\Controllers\ResidenceController');
Route::resource('recherche','App\Http\Controllers\RechercheController');
Route::resource('statut','App\Http\Controllers\StatutController');
Route::resource('maille','App\Http\controllers\MailleController');
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

