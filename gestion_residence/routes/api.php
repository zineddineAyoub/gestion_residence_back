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

Route::group([

    //'middleware' => 'api',
    //'middleware'=>'auth:api', ['except' => ['login']],
    'prefix' => 'auth'

], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});


Route::group([
    'middleware'=>'auth:api',
],function(){
  //  Route::get('index','ArticlesController@index');
    
});

Route::post('article','ArticlesController@store');
Route::get('index','ArticlesController@index');
Route::get('article/search/{tag}','ArticlesController@search');
Route::delete('article/{article}','ArticlesController@destroy');
Route::post('article/{article}','ArticlesController@update');
Route::get('article/{article}','ArticlesController@show');



Route::get('category/index','CategoryController@index');

Route::get('tag/index','TagsController@index');
Route::post('tag','TagsController@store');
Route::put('tag','TagsController@update');

Route::post('reclamation','ReclamationController@store');
Route::get('reclamation','ReclamationController@index');
Route::get('reclamation/{reclamation}','ReclamationController@show');
Route::delete('reclamation/{reclamation}','ReclamationController@delete');
Route::get('reclamationPdf/{reclamation}','ReclamationController@pdf');


Route::get('reclaimer','ReclaimerController@index');

Route::post('reclamation_type','Reclamation_typeController@store');
Route::get('reclamation_type','Reclamation_typeController@index');


Route::post('reclamation_state','Reclamation_stateController@store');
Route::get('reclamation_state','Reclamation_stateController@index');
Route::post('reclamation_attachState','ReclamationController@attachState');


Route::get('availability','AvailabilityController@index');
