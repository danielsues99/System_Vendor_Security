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
Auth::routes(); //Rutas para la autenticacion de usuarios
Route::resource('/products', 'ProductController'); //Generamos todas las rutas para productos
Route::resource('/customers', 'CustomerController');

Route::get('/home', 'HomeController@index')->name('home');
