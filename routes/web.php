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

Route::get('/', 'PageController@index');
Route::get('service', 'PageController@service');
Route::get('project', 'PageController@project');
Route::get('contact', 'PageController@contact');
Route::get('about', 'PageController@about');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/add', 'DashboardController@add');
Route::get('/dashboard/show', 'DashboardController@show');
Route::post('/dashboard/store', 'DashboardController@store');

Auth::routes();

