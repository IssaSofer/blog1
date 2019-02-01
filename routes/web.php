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

Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');



Route::get('/request', 'ReqiuestController@index')->name('reqiuest.req');
Route::post('/request','ReqiuestController@store')->name('reqiuest.req.submit');



Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'AuthAdmin\ResetPasswordController@reset');


    Route::get('/addadmin', 'AdminController@create')->name('admin.create');
    Route::post('/addadmin', 'AdminController@store')->name('admin.create.submit');

	Route::get('/addstudents', 'AddstudentController@index')->name('addstudent.addstudent');
    Route::post('/addstudents', 'AddstudentController@create')->name('addstudent.addstudent.submit');



    Route::resource('/request', 'ReqiuestadminController');

    Route::put('/request/{$id}', 'ReqiuestController@update');


    // students route
    Route::resource('/students', 'StudentsController');
});