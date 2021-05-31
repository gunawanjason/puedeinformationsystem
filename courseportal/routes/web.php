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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/students', 'StudentsController@index')->middleware('auth');

Route::post('/students/add', 'StudentsController@store')->middleware('auth');

Route::delete('/students/delete/{student}', 'StudentsController@destroy')->middleware('auth');

Route::patch('/students/edit/{student}', 'StudentsController@update')->middleware('auth');

Route::get('/teachers', 'TeachersController@index')->middleware('auth');

Route::post('/teachers/add', 'TeachersController@store')->middleware('auth');

Route::delete('/teachers/delete/{teacher}', 'TeachersController@destroy')->middleware('auth');

Route::patch('/teachers/edit/{teacher}', 'TeachersController@update')->middleware('auth');

Route::get('/staffs', 'StaffsController@index')->middleware('auth');

Route::post('/staffs/add', 'StaffsController@store')->middleware('auth');

Route::delete('/staffs/delete/{staff}', 'StaffsController@destroy')->middleware('auth');

Route::patch('/staffs/edit/{staff}', 'StaffsController@update')->middleware('auth');

Route::get('/subjects', 'SubjectsController@index')->middleware('auth');

Route::post('/subjects/add', 'SubjectsController@store')->middleware('auth');

Route::delete('/subjects/delete/{student}', 'SubjectsController@destroy')->middleware('auth');

Route::patch('/subjects/edit/{student}', 'SubjectsController@update')->middleware('auth');
