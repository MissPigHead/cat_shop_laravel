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

Route::namespace('API')->name('api.')->group(function () {
// Route::middleware('can:admin')->namespace('Backend')->group(function () {
    Route::apiResource('banner', 'BannerController')->except('index');
    Route::apiResource('category', 'CategoryController');
    Route::apiResource('news', 'NewsController');
    Route::apiResource('order', 'OrderController');
    Route::apiResource('product', 'ProductController')->except('index');
    Route::apiResource('recipient', 'RecipientController');
    Route::apiResource('user', 'UserController')->except('index');

    Route::patch('banner/{id}/move', 'BannerController@move')->name('banner.move');

    Route::get('category/{id}/child', 'CategoryController@child');
    Route::patch('category/{id}/move', 'CategoryController@move')->name('category.move');

    Route::get('user/{id}/order', 'UserController@getOrder');

    Route::post('news/edit', 'NewsController@updateWithFile')->name('news.edit');

});
