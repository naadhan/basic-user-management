<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::post('/login/custom', [
    'uses' => 'LoginController@login',
    'as' => 'login.custom'
]);

Route::prefix('user')->group(function () {
    Route::get('/', [
        'uses' => 'UserController@index',
        'as' => 'user'
    ]);

    Route::get('/edit', [
        'uses' => 'UserController@edit',
        'as' => 'user/edit'
    ]);

    Route::post('/edit', [
        'uses' => 'UserController@update',
        'as' => 'user/edit'
    ]);
});


Route::prefix('admin')->group(function () {
    Route::get('/', [
        'uses' => 'adminController@index',
        'as' => 'admin',
    ]);
    Route::get('/status-update', [
        'uses' => 'adminController@statusUpdate',
        'as' => 'admin/status-update',
    ]);
});

Auth::routes();
