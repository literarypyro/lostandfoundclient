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

Route::get('/dashboard/{requestId}',function($requestId){ return Inertia::render('Request',['requestId'=>$requestId]); });

Route::get('/createRequest/{userID}',function($userID){ return Inertia::render('CreateRequest',['user'=>$userID]); });

Route::get('/registerUser',function(){ return Inertia::render('Register'); });

Route::get('/dashboardItem',function(){ return Inertia::render('Item'); });


Route::get('/requests/{requestId}',['as'=>'retrieve-requests','uses'=>'RequestController@listRequests']);

Route::post('/addrequest/{requestId}',['as'=>'add-request','uses'=>'RequestController@addRequest']);


Route::get('/daterangesearch/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'date-range-search','uses'=>'FoundItemController@dateRangeSearch']);

Route::get('/itemtypesearch/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'item-type-search','uses'=>'FoundItemController@itemTypeSearch']);

Route::get('/categorysearch/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'category-search','uses'=>'FoundItemController@categorySearch']);

Route::get('/daterangefound/{searchType}/{searchTerm}/range/{dateRange}',
['as'=>'date-range-found','uses'=>'FoundItemController@dateRangeFound']);

Route::get('/item/{itemId}',['as'=>'retrieve-items','uses'=>'FoundItemController@retrieveItem']);

Route::get('/request/{requestid}',['as'=>'retrieve-request','uses'=>'RequestController@retrieveRequest']);



Route::get('/category',
['as'=>'category-list','uses'=>'ApiController@listCategory']);

Route::get('/itemType/list',
['as'=>'item-type-list','uses'=>'ApiController@listItemType']);

Route::get('/locations',
['as'=>'locations-list','uses'=>'ApiController@listLocations']);

Route::get('/countries',
['as'=>'country-list','uses'=>'ApiController@listCountry']);


Route::post('/login',
['as'=>'login-user','uses'=>'AuthController@loginUser']);

Route::post('/newuser',
['as'=>'register-user','uses'=>'AuthController@registerUser']);

Route::get('/logout',function(){ return Inertia::render('Login'); });


Route::post('/registerAddress/{id}',
['as'=>'reg-user-address','uses'=>'AuthController@addUserAddress']);

Route::post('/registerProfile/{id}',
['as'=>'reg-user-profile','uses'=>'AuthController@addUserProfile']);

Route::post('/registerContact/{id}',
['as'=>'reg-user-contact','uses'=>'AuthController@addUserContact']);

Route::get('/{any}', function () {
    return Inertia::render('Login');// or any custom view for non-matching routes
})->where('any', '.*'); 