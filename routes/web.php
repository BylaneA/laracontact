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

Route::post('/groups', [
  'uses' => 'GroupController@store',
  'as' => 'groups'
]);

Route::get('/group/edit/{group}', [
  'uses' => 'GroupController@edit',
  'as' => 'group.edit'
]);

Route::post('/group/update/{goup}',[
  'uses' => 'GroupController@update',
  'as' => 'group.update'
]);
