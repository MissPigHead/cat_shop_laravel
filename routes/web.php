<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('frontend.main');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index');
    Route::get('/{content}','AdminController@content');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
