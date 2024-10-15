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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('theses', 'ThesesController');





Route::get('users', 'UsersController@index')->name('users.index');
Route::delete('users/{user}', 'UsersController@destroy')->name('users.destroy');
Route::get('users/{user}', 'UsersController@show')->name('users.show');
Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::put('users/{user}', 'UsersController@update')->name('users.update');
Route::get('/search', 'UsersController@search');


Route::get('assignments', 'AssignmentsController@index')->name('assignments.index');
Route::get('assignments/{assignment}', 'AssignmentsController@show')->name('assignments.show');
Route::post('theses/{thesis}/assignments', 'AssignmentsController@store')->name('assignments.store');
Route::put('assignments/{assignment}', 'AssignmentsController@update')->name('assignments.update');
Route::delete('assignments/{assignment}', 'AssignmentsController@destroy')->name('assignments.destroy');


Route::get('discusions', 'DiscusionsController@index')->name('discusions.index');
Route::get('discusions/create', 'DiscusionsController@create')->name('discusions.create');
Route::post('discusions', 'DiscusionsController@store')->name('discusions.store');
Route::get('discusions/{discusion}', 'DiscusionsController@show')->name('discusions.show');
Route::delete('discusions/{discusion}', 'DiscusionsController@destroy')->name('discusions.destroy');
Route::get('discusions/{discusion}/edit', 'DiscusionsController@edit')->name('discusions.edit');
Route::put('discusions/{discusion}', 'DiscusionsController@update')->name('discusions.update');


Route::resource('discusions/{discusion}/replies', 'RepliesController');