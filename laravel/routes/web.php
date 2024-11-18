<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function() {
    return Inertia::render('Login');
});

Route::get('/requests/{requestId}',['as'=>'retrieve-requests','uses'=>'RequestController@retrieveRequest']);

Route::post('/addrequest/{requestId}',['as'=>'add-request','uses'=>'RequestController@addRequest']);


Route::get('/daterangesearch/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'date-range-search','uses'=>'FoundItemController@dateRangeSearch']);

Route::get('/itemtypesearch/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'item-type-search','uses'=>'FoundItemController@itemTypeSearch']);

Route::get('/categorysearch/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'category-search','uses'=>'FoundItemController@categorySearch']);

Route::get('/daterangefound/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'date-range-found','uses'=>'FoundItemController@dateRangeFound']);

Route::get('/item/{itemId}',['as'=>'retrieve-requests','uses'=>'FoundItemController@retrieveItem']);


Route::get('/category',
['as'=>'category-list','uses'=>'ApiController@listCategory']);

Route::get('/itemType/list',
['as'=>'item-type-list','uses'=>'ApiController@listItemType']);

Route::get('/login',
['as'=>'item-type-list','uses'=>'AuthController@loginUser']);

Route::get('/register',
['as'=>'register-user','uses'=>'AuthController@registerUser']);

Route::get('/logout',
['as'=>'logout','uses'=>'AuthController@logoutUser']);


Route::get('/registerAddress/{id}',
['as'=>'reg-user-address','uses'=>'AuthController@addUserAddress']);

Route::get('/registerProfile/{id}',
['as'=>'reg-user-profile','uses'=>'AuthController@addUserProfile']);

Route::get('/registerContact/{id}',
['as'=>'reg-user-contact','uses'=>'AuthController@addUserContact']);
