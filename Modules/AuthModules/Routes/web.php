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

use Illuminate\Support\Facades\Auth;

Route::post('auth/login','AuthModulesController@login');
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('auth')->group(function() {
        Route::get('/changepassword', 'AuthModulesController@changepassword');
        Route::post('/changepassword','AuthModulesController@postpassword');
        Route::get('/logout',function(){
            Auth::logout();
            return redirect('/login');
        });
    });
});