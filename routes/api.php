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

Route::apiResource('news', 'API\NewsController')->except(['index']);
Route::apiResource('category', 'API\CategoryController')->except(['index']);
Route::apiResource('banner', 'API\BannerController')->except(['index']);
Route::apiResource('user', 'API\UserController')->except(['index']);
Route::get('category/{id}/child', 'API\CategoryController@child');
Route::patch('category/{id}/move', 'API\CategoryController@move');
Route::patch('banner/{id}/move', 'API\BannerController@move');
Route::post('news/edit', 'API\NewsController@updateWithFile')->name('news.edit');
