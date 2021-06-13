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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* 
    The route is fired by the "curl --location --request GET 'http://localhost:8000/api/hello-world'"
        curl: command used download and upload files.
        --location: required to issue a request.
*/
Route::get('hello-world', function() {
    // "::" (scope resolution operator) : Refer to a static method
    return ['data' => ['message'=>'Hello World API']];

});

Route::get('hello-asaka', function() {
    return ['data' => ['massage'=>'Hello Asaka']];
});

/* 
    Launch own controller
*/
use App\Http\Controllers\Api\HelloWorldController;
Route::get('hello-world-with-controller', [HelloWorldController::class, 'index']);

Route::get('hello-asaka-with-controller', [HelloWorldController::class, 'index2']);

/* 
    Routes to excute CRUD
*/
use App\Http\Controllers\Api\ArticleController;
Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{id}', [ArticleController::class, 'show']);
Route::post('articles', [ArticleController::class, 'store']);
Route::put('articles/{id}', [ArticleController::class, 'update']);

