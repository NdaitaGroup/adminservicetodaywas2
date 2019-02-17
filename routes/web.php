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
Route::get('/',function (){
    return view('welcome');
});

Auth::routes();
//----------------------------------------------------------------------------------------------------

Route::get('/home', 'HomeController@index')->name('home');
//----------------------------------------------------------------------------------------------------
Route::get('/rating','LocationShopController@index')->name('rating');
Route::get('/location','LocationShopController@locations')->name('location');
Route::post('/save-location','LocationShopController@store')->name('save.location');
//----------------------------------------------------------------------------------------------------
Route::get('/questionnaire','QuestionnaireController@index')->name('questionnaire');
Route::post('/save-questionnaire','QuestionnaireController@store')->name('save.questionnaire');
//----------------------------------------------------------------------------------------------------
Route::get('/getStats','RatingCommentController@getStats');
Route::get('/comments','RatingCommentController@comments')->name('comments');
Route::post('/save-comments','RatingCommentController@store')->name('save.comments');
//-------------------------------------Users Starts Here----------------------------------------------
Route::get('/add-user','UsersController@create')->name('add.user');
Route::get('/add-storeUsers','UsersController@createUsers')->name('add.storeUsers');
Route::post('/add-superUser','UsersController@addSuperUser')->name('add.Superuser');
Route::post('/add-Savestore','UsersController@store')->name('store');
//-------------------------------------Users Ends Here------------------------------------------------
Route::get('/stores','StoreController@index')->name('stores');
Route::post('/add-store','StoreController@addStore')->name('add.store');
//----------------------------------------------------------------------------------------------------
Route::get('/places','ShopsInLocationController@index')->name('places');
Route::post('/save-place','ShopsInLocationController@store')->name('save.place');