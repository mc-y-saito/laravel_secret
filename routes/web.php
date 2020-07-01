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

Route::get('/', function () {
    return view('welcome');
});

# ユーザー登録
Route::get('signup', 'SignupController@index')->name('signup.index');
Route::post('signup', 'SignupController@postIndex');
Route::get('signup/confirm', 'SignupController@confirm')->name('signup.confirm');
Route::post('signup/confirm', 'SignupController@postConfirm');
Route::get('signup/thanks', 'SignupController@thanks')->name('signup.thanks');

# 管理者
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function ()
{
    Route::middleware('guest:admin')->group(function ()
    {
        # ログイン画面
        Route::get('admin/login', 'Admin\LogionController@showLoginForm')->name('admin.login');
        Route::post('admin/login', 'Admin\LoginController@login');
    });

    Route::middleware('auth:admin')->group(function ()
    {
        # ログアウト
        Route::get('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');

        # 管理者画面TOP
        Route::get('admin', 'Admin\IndexController@index')->name('admin.top');
    });
});
