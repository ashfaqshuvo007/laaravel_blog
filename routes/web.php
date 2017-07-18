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
/*Category Routes*/
Route::get('/add_category','SuperAdminController@add_category');
Route::post('/save-category','SuperAdminController@save_category');
Route::get('/manage-category','SuperAdminController@manage_category');
Route::get('/unpublished-category/{id}','SuperAdminController@unpublished_category');
Route::get('/published-category/{id}','SuperAdminController@published_category');
Route::get('/delete-category/{id}','SuperAdminController@delete_category');
Route::get('/edit-category/{id}','SuperAdminController@edit_category');
Route::post('/update-category/','SuperAdminController@update_category');
/*Blog Routes*/
Route::get('/add-blog','SuperAdminController@add_blog');
Route::get('/logout','SuperAdminController@logout');
