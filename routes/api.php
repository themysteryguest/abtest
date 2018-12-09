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

//login endpoint - if username and password match an entry in the users table a token is returned, which can be used for subsequent api calls
Route::get('/login', 'ApiController@login')->name('login');


Route::middleware('auth:api')->group(function() {
    Route::get('projects','ProjectController@index'); //full project list
    Route::get('projects/{projectId}','ProjectController@show'); //show the specified project
});

