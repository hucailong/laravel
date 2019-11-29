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





Route::view('/login','student\login');
Route::post('/login_do','Student\LoginController@login');
Route::get('/student','Student\StudentController@student');
Route::post('/student_do','Student\StudentController@student_do');
Route::get('/student/index','Student\StudentController@index');
Route::get('/update/{id}','Student\StudentController@update');
Route::post('student_do/{id}','Student\StudentController@update_do');
