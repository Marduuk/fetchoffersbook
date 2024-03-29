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

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('offers/get', [
    'as' => 'offers.getAll',
    'uses' => 'OfferController@getAllOffers'
]);

Route::get('offers/fetchexternal', [
    'as' => 'offers.fetchExternal',
    'uses' => 'OfferController@fetchOffersFromExternal'
]);

