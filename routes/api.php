<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::namespace('Api')->group(function() {
    Route::post('login', 'AuthController@login');
    Route::post('forgot-password', 'AuthController@forgotPassword');
    Route::post('reset-password', 'AuthController@resetPassword');

    Route::middleware('auth:api')->group(function() {
        Route::post('logout', 'AuthController@logout');
        Route::post('me', 'AuthController@me');
        Route::post('me/update-profile', 'UserController@updateProfile');
        Route::post('users/search', 'UserController@search');
        Route::post('tasks/search', 'TaskController@search');
        Route::get('get-tasks', 'TaskController@getTasks');
        Route::get('get-my-tasks/{id}', 'TaskController@getMyTasks');
        Route::get('my-user/{id}', 'UserController@getMyUser');
        Route::get('taskUser/{id}', 'TaskUser@taskUser');
        Route::apiResources([
            'departments' => 'DepartmentController',
            'users' => 'UserController',
            'status' => 'StatusController',
            'tasks' => 'TaskController',
        ]);
    });
});
