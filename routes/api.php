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

Route::namespace('API')->name('api.')->group(function () {
// Route::middleware('can:admin')->namespace('Backend')->group(function () {
    Route::apiResource('news', 'NewsController')->except(['index']);
    Route::post('news/edit', 'NewsController@updateWithFile')->name('news.edit');

    Route::apiResource('category', 'CategoryController');
    Route::get('category/{id}/child', 'CategoryController@child');
    Route::patch('category/{id}/move', 'CategoryController@move');

    Route::apiResource('product', 'ProductController');

    Route::apiResource('banner', 'BannerController');
    Route::patch('banner/{id}/move', 'BannerController@move');

    Route::apiResource('user', 'UserController');
    Route::get('user/{id}/order', 'UserController@getOrder');

    Route::apiResource('order', 'OrderController');

    Route::apiResource('recipient', 'RecipientController');
});
