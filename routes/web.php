<?php

use App\Models\Categoria;
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

Route::get('/', 'WellcomeController@index');

Auth::routes();
Route::get('categorias/{categoria}/productos','WellcomeController@show')->name('categoria.productos');
//Route::get('/home', 'HomeController@index')->name('home');
Route::group([
	'prefix' => 'admin',
	'middleware' => 'auth'],
function(){
	Route::get('/', 'AdminController@index')->name('admin');
	Route::get('users/{slug}','UserController@show')->name('admin.users.show');
    Route::put('users/{slug}','UserController@create')->name('admin.users.create');
    Route::get('users', 'UserController@index')->name('admin.users.index');
    Route::post('users', 'UserController@store')->name('admin.users.store');
    Route::get('users/{slug}/edit', 'UserController@edit')->name('admin.users.edit');
    Route::put('users/{slug}/update','UserController@update')->name('admin.users.update');
    Route::delete('users/{slug}/baja','UserController@destroy')->name('admin.users.delete');
    //Estas son las rutas para Complementos
    Route::get('categorias', 'CategoriaController@index')->name('admin.categorias');
	Route::post('categorias', 'CategoriaController@store')->name('admin.categorias.store');
    Route::get('categorias/{slug}/edit', 'CategoriaController@edit')->name('admin.categorias.edit');

    Route::put('categorias/{slug}/actualizar', 'CategoriaController@update')->name('admin.categorias.update');
    Route::delete('categorias/{slug}/baja', 'CategoriaController@destroy')->name('admin.categorias.delete');

    //rutas para las tallas
    Route::resource('tallas','TallaController');
    Route::get('tallas','TallaController@index')->name('admin.tallas.index');
    Route::post('tallas', 'TallaController@store')->name('tallas.store');
    Route::get('tallas/{slug}/edit', 'TallaController@edit')->name('admin.tallas.edit');
    Route::put('tallas/{slug}', 'TallaController@update')->name('admin.tallas.update');
    Route::delete('tallas/{slug}/baja', 'TallaController@destroy')->name('admin.tallas.delete');

    //Rutas para los materiales
    Route::get('materiales','MaterialController@index')->name('admin.materiales.index');
    Route::post('materiales', 'MaterialController@store')->name('materiales.store');
    Route::get('materiales/{slug}/edit', 'MaterialController@edit')->name('admin.materiales.edit');
    Route::put('materiales/{slug}', 'MaterialController@update')->name('admin.materiales.update');
    Route::delete('materiales/{slug}/baja', 'MaterialController@destroy')->name('admin.materiales.delete');
    //Rutas para los productos
    Route::get('productos','ProductoController@index')->name('admin.productos.index');
    Route::get('productos/create','ProductoController@create')->name('admin.productos.create');
    Route::post('productos','ProductoController@store')->name('admin.productos.store');
    }
);
