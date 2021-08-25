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

Route::namespace('API')->group(function () {
    Route::apiResource('news', 'NewsController')->except(['index']);
    Route::apiResource('category', 'CategoryController')->except(['index']);
    Route::apiResource('banner', 'BannerController')->except(['index']);
    Route::apiResource('user', 'UserController')->except(['index']);
    Route::apiResource('order', 'OrderController')->except(['index']);
    Route::apiResource('recipient', 'RecipientController')->except(['index']);
    Route::get('category/{id}/child', 'CategoryController@child');
    Route::patch('category/{id}/move', 'CategoryController@move');
    Route::patch('banner/{id}/move', 'BannerController@move');
    Route::post('news/edit', 'NewsController@updateWithFile')->name('news.edit');
    Route::get('user/{id}/order', 'UserController@getOrder');
});
