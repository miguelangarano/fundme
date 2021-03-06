<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Controllers\UserController;
use App\Controllers\ProjectController;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('/create-user', 'UserController@createUser');
Route::post('/login-user', 'UserController@loginUser');
Route::post('/create-project', 'ProjectController@createProject');
Route::post('/makepayment', 'PaymentData@encryptCardData');
Route::post('/get-projects', 'ProjectController@getProjects');