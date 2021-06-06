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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => ['apiJwt']], function(){
  Route::get('users', 'Api\UserController@index');
  Route::get('users/{user}', 'Api\UserController@show');
  Route::post('users/store', 'Api\UserController@store');
  Route::put('users/{user}', 'Api\UserController@update');
  Route::delete('users/{obra}', 'Api\UserController@destroy');

  Route::get('obras', 'Api\ObraController@index');
  Route::get('obras/{obra}', 'Api\ObraController@show');
  Route::post('obras/store', 'Api\ObraController@store');
  Route::put('obras/{obra}', 'Api\ObraController@update');
  Route::delete('obras/{obra}', 'Api\ObraController@destroy');

  Route::get('tarefas', 'Api\TarefaController@index');
});