<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List Articles
Route::get('articles','ArticleController@index');
//List Single Article
Route::get('article/{id}','ArticleController@show');
//Create New Article
Route::post('article','ArticleController@store');
//Update Article
Route::put('article','ArticleController@store');
//Delete Article
Route::delete('article/{id}','ArticleController@destroy');

//Passport Authentication Routes
Route::post('login','API\PassportController@login');
Route::post('register','API\PassportController@register');
Route::group(['middleware'=>'auth:api'],function (){
    Route::post('get-details','API\PassportController@getDetails');
});