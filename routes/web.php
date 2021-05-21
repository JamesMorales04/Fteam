<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['prefix' => 'food'], function () {
    Route::get('/show', 'App\Http\Controllers\FoodController@showAll')->name('food.showAll');
    Route::get('/topThree', 'App\Http\Controllers\OrderedFoodController@topThree')->name('food.topThree');
});

Route::group(['prefix' => 'food', 'middleware' => ['login', 'admin']], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\FoodController@show')->name('food.show');
    Route::get('/create', 'App\Http\Controllers\FoodController@create')->name('food.create');
    Route::get('/update/{id}', 'App\Http\Controllers\FoodController@update')->name('food.update');
    Route::post('/save', 'App\Http\Controllers\FoodController@save')->name('food.save');
    Route::post('/saveupdate', 'App\Http\Controllers\FoodController@updateSave')->name('food.updateSave');
    Route::delete('/delete/{id}', 'App\Http\Controllers\FoodController@delete')->name('food.delete');
});

Route::group(['prefix' => 'reviews', 'middleware' => ['login']], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\ReviewsController@show')->name('reviews.show');
    Route::get('/create/{id}', 'App\Http\Controllers\ReviewsController@create')->name('reviews.create');
    Route::post('/save', 'App\Http\Controllers\ReviewsController@save')->name('reviews.save');
    Route::delete('/delete/{id}', 'App\Http\Controllers\ReviewsController@delete')->name('reviews.delete');
    Route::get('/update/{id}', 'App\Http\Controllers\ReviewsController@update')->name('reviews.update');
    Route::post('/saveupdate', 'App\Http\Controllers\ReviewsController@updateSave')->name('reviews.updateSave');
});

Route::group(['prefix' => 'reviews'], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\ReviewsController@show')->name('reviews.show');
});

Route::group(['prefix' => 'orderedfood', 'middleware' => ['login']], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\OrderedFoodController@show')->name('orderedFood.show');
    Route::get('/show', 'App\Http\Controllers\OrderedFoodController@showAll')->name('orderedFood.showAll');
    Route::delete('/show/{id}', 'App\Http\Controllers\OrderedFoodController@delete')->name('orderedFood.delete');
});

Route::group(['prefix' => 'shop', 'middleware' => ['login']], function () {
    Route::post('/add', 'App\Http\Controllers\ShoppingController@add')->name('shop.add');
    Route::get('/removeAll', 'App\Http\Controllers\ShoppingController@removeAll')->name('shop.removeAll');
    Route::get('/cart', "App\Http\Controllers\ShoppingController@cart")->name('shop.cart');
    Route::get('/buy', "App\Http\Controllers\ShoppingController@buy")->name('shop.buy');
    Route::get('/ingredients/{id}', "App\Http\Controllers\ShoppingController@ingredients")->name('shop.ingredients');
    Route::get('/pdf', 'App\Http\Controllers\ShoppingController@createPdf')->name('shop.pdf');
    Route::get('/mail', 'App\Http\Controllers\ShoppingController@sendEmail')->name('shop.email');
    Route::post('/addAsIngresients', 'App\Http\Controllers\ShoppingController@addAsIngresients')->name('shop.addAsIngresients');
    Route::post('/addIngredient', 'App\Http\Controllers\ShoppingController@addIngredient')->name('shop.addIngredient');
    //PayPal
    Route::get('/payment', 'App\Http\Controllers\ShoppingController@payment')->name('payment');
    Route::get('/cancel', 'App\Http\Controllers\ShoppingController@cancel')->name('payment.cancel');
    Route::get('/payment/success', 'App\Http\Controllers\ShoppingController@success')->name('payment.success');
});

Route::group(['prefix' => 'users', 'middleware' => ['login']], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');
    Route::get('/delete/{id}', 'App\Http\Controllers\UserController@delete')->name('user.delete');
    Route::get('/update/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::post('/updateSave', 'App\Http\Controllers\UserController@updateSave')->name('user.updateSave');
});

Route::group(['prefix' => 'admin', 'middleware' => ['login', 'admin']], function () {
    Route::get('/panel', 'App\Http\Controllers\AdminController@show')->name('admin.panel');
    Route::get('/showAll', 'App\Http\Controllers\AdminController@showAllOrdersAdmin')->name('admin.showAllOrders');
    Route::get('/users/showAll', 'App\Http\Controllers\AdminController@showAllUsersAdmin')->name('admin.showAllUsers');
    Route::get('/ingredient/show', 'App\Http\Controllers\IngredientsController@showAll')->name('ingredients.show');
    Route::get('/ingredient/show/{id}', 'App\Http\Controllers\IngredientsController@showIngredient')->name('ingredients.showI');
    Route::get('/ingredient/create', 'App\Http\Controllers\IngredientsController@create')->name('ingredients.create');
    Route::post('/ingredient/save', 'App\Http\Controllers\IngredientsController@save')->name('ingredients.save');
    Route::get('/ingredient/ingredient/delete/{id}', 'App\Http\Controllers\IngredientsController@delete')->name('ingredients.delete');
    Route::get('/ingredient/update/{id}', 'App\Http\Controllers\IngredientsController@update')->name('ingredients.update');
    Route::post('/ingredient/saveupdate', 'App\Http\Controllers\IngredientsController@updateSave')->name('ingredients.updateSave');
    Route::get('/food/show', 'App\Http\Controllers\AdminController@showAllFood')->name('admin.showAllFood');

});

Route::group(['prefix' => 'orders', 'middleware' => ['login']], function () {
    Route::get('/showAll', 'App\Http\Controllers\OrderController@showAll')->name('order.showAll');
    Route::get('/showAllAdmin', 'App\Http\Controllers\OrderController@showAllAdmin')->name('order.showAllAdmin');
    Route::post('/save', 'App\Http\Controllers\OrderController@save')->name('order.save');
});

Route::group(['prefix' => 'creditCards', 'middleware' => ['login']], function () {
    Route::get('/show/{id}', 'App\Http\Controllers\CreditCardController@show')->name('creditCard.show');
    Route::get('/create', 'App\Http\Controllers\CreditCardController@create')->name('creditCard.create');
    Route::post('/save', 'App\Http\Controllers\CreditCardController@save')->name('creditCard.save');
    Route::get('/delete/{id}', 'App\Http\Controllers\CreditCardController@delete')->name('creditCard.delete');
    Route::get('/update/{id}', 'App\Http\Controllers\CreditCardController@update')->name('creditCard.update');
    Route::post('/updateSave', 'App\Http\Controllers\CreditCardController@updateSave')->name('creditCard.updateSave');
});
