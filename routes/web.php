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
//PAGES ROUTES
Route::get('/','WelcomeController@index');

Route::get('/portfolio','WelcomeController@portfolio');

Route::get('/services','WelcomeController@services');

Route::get('/contact','WelcomeController@contact');

/*

    START ADMIN ROUTES 
 *  */

Route::get('/admin-panel','AdminController@index');
Route::post('/admin-login-check','AdminController@admin_login_check');


/*Super Admin Start*/
Route::get('/dashboard','SuperAdminController@index');
Route::get('/add_category','SuperAdminController@add_category');
Route::post('/save-category','SuperAdminController@save_category');
Route::get('/logout','SuperAdminController@logout');
