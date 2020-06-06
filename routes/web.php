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
Route::get('{categoria}/productos','WellcomeController@show')->name('categoria.productos');
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
	}
);
