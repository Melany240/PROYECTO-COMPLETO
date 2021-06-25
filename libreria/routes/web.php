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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('autores', 'AutoresController');
Route::resource('librerias', 'LibreriasController');
Route::resource('libros', 'LibrosController');
Route::resource('editoriales', 'EditorialesController');
Route::resource('empleados', 'EmpleadosController');
Route::resource('librosPrestados', 'LibrosPrestadosController');
Route::resource('facturaDetalles', 'FacturaDetallesController');
Route::resource('facturas', 'FacturasController');
Route::resource('personas', 'personasController');