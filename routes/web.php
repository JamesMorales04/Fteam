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

Route::get('/food/show/{id}', 'App\Http\Controllers\FoodController@show')->name('food.show');
Route::get('/food/show', 'App\Http\Controllers\FoodController@showAll')->name('food.showAll');
Route::get('/food/create', 'App\Http\Controllers\foodController@create')->name('food.create');
Route::post('/food/save', 'App\Http\Controllers\foodController@save')->name('food.save');
Route::delete('/food/show/{id}', 'App\Http\Controllers\FoodController@delete')->name('food.delete');

Route::get('/orderedfood/show/{id}', 'App\Http\Controllers\OrderedFoodController@show')->name('orderedFood.show');
Route::get('/orderedfood/show', 'App\Http\Controllers\OrderedFoodController@showAll')->name('orderedFood.showAll');
Route::delete('/orderedfood/show/{id}', 'App\Http\Controllers\OrderedFoodController@delete')->name('orderedFood.delete');
