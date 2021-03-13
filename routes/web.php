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

Route::group(['prefix' => 'ingredient'], function () {
    Route::get('/show/', 'App\Http\Controllers\IngredientsController@show')->name('Ingredients.show');
    Route::get('/show/{id}', 'App\Http\Controllers\IngredientsController@showI')->name('Ingredients.showI');
    Route::get('/create', 'App\Http\Controllers\IngredientsController@create')->name('Ingredients.create');
    Route::post('/save', 'App\Http\Controllers\IngredientsController@save')->name('Ingredients.save');
    Route::get('/ingredient/delete/{id}', 'App\Http\Controllers\IngredientsController@delete')->name('Ingredients.delete');
});

Route::group(['prefix' => 'food'], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\FoodController@show')->name('food.show');
    Route::get('/show', 'App\Http\Controllers\FoodController@showAll')->name('food.showAll');
    Route::get('/create', 'App\Http\Controllers\foodController@create')->name('food.create');
    Route::post('/save', 'App\Http\Controllers\foodController@save')->name('food.save');
    Route::delete('/show/{id}', 'App\Http\Controllers\FoodController@delete')->name('food.delete');
});

Route::group(['prefix' => 'orderedfood'], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\OrderedFoodController@show')->name('orderedFood.show');
    Route::get('/show', 'App\Http\Controllers\OrderedFoodController@showAll')->name('orderedFood.showAll');
    Route::delete('/show/{id}', 'App\Http\Controllers\OrderedFoodController@delete')->name('orderedFood.delete');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');
    Route::get('/delete/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');
    Route::get('/update/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::post('/updateSave', 'App\Http\Controllers\UserController@updateSave')->name('user.updateSave');
});

Route::group(['prefix' => 'orders'], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
    Route::get('/create', 'App\Http\Controllers\OrderController@create')->name('order.create');
    Route::post('/save', 'App\Http\Controllers\OrderController@save')->name('order.save');
    Route::get('/delete/{id}', 'App\Http\Controllers\OrderController@delete')->name('order.delete');
});

Route::group(['prefix' => 'creditCards'], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\CreditCardController@show')->name('creditCard.show');
    Route::get('/create', 'App\Http\Controllers\CreditCardController@create')->name('creditCard.create');
    Route::post('/save', 'App\Http\Controllers\CreditCardController@save')->name('creditCard.save');
    Route::get('/delete/{id}', 'App\Http\Controllers\CreditCardController@delete')->name('creditCard.delete');
    Route::get('/update/{id}', 'App\Http\Controllers\CreditCardController@update')->name('creditCard.update');
    Route::post('/updateSave', 'App\Http\Controllers\CreditCardController@updateSave')->name('creditCard.updateSave');
});

