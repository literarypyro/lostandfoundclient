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

Route::get('/requests/{requestId}',[RequestController::class,'retrieveRequest']);

Route::get('/daterangesearch/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'date-range-search','uses'=>'FoundItemController@dateRangeSearch']);

Route::get('/itemtypesearch/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'item-type-search','uses'=>'FoundItemController@itemTypeSearch']);

Route::get('/categorysearch/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'category-search','uses'=>'FoundItemController@categorySearch']);

Route::get('/daterangefound/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'date-range-found','uses'=>'FoundItemController@dateRangeFound']);