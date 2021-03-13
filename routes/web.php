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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/ingredient/show/', 'App\Http\Controllers\IngredientsController@show')->name('Ingredients.show');

Route::get('/ingredient/show/{id}', 'App\Http\Controllers\IngredientsController@showI')->name('Ingredients.showI');

Route::get('/ingredient/create', 'App\Http\Controllers\IngredientsController@create')->name('Ingredients.create');

Route::post('/ingredient/save', 'App\Http\Controllers\IngredientsController@save')->name('Ingredients.save');

Route::get('/ingredient/delete/{id}', 'App\Http\Controllers\IngredientsController@delete')->name('Ingredients.delete');
