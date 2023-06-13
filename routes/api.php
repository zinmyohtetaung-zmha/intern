<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//  Route::get('index', 'API\UserController@index');
//  Route::post('store', 'API\UserController@store');
//  Route::get('show/{id}', 'API\UserController@show');
//  Route::put('update/{id}', 'API\UserController@update');
//  Route::delete('delete/{id}', 'API\UserController@destroy');


//  Route::get('index', 'API\UserRepoController@index');
//  Route::post('store', 'API\UserRepoController@store');
//  Route::get('show/{id}', 'API\UserRepoController@show');
//  Route::put('update/{id}', 'API\UserRepoController@update');
//  Route::delete('delete/{id}', 'API\UserRepoController@destroy');

 Route::group(['prefix'=> '/school'], function(){
    Route::get('/getschools', 'ZinMyoHtetAungController@getSchools')->name('getschools');    
    Route::post('/createschool', 'ZinMyoHtetAungController@createschool')->name('createschool');
    Route::put('/updateschool/{id}', 'ZinMyoHtetAungController@updateschool')->name('updateschool');
    Route::delete('/deleteuser/{id}', 'ZinMyoHtetAungController@deleteuser')->name('deleteuser');
 });

 Route::group(['prefix'=> '/student'], function(){
    Route::get('/getstudents', 'ZinMyoHtetAungController@getStudents')->name('getstudents'); 
    Route::get('/jointable', 'ZinMyoHtetAungController@jointable')->name('jointable');    
    Route::post('/createStudent', 'ZinMyoHtetAungController@createStudent')->name('createStudent');
    Route::put('/updateStudent/{id}', 'ZinMyoHtetAungController@updateStudent')->name('updateStudent');
    Route::delete('/deleteStudent/{id}', 'ZinMyoHtetAungController@deleteStudent')->name('deleteStudent');
 });

 Route::group(['prefix'=> '/teacher'], function(){
    Route::get('/getTeachers', 'ZinMyoHtetAungController@getTeachers')->name('getTeachers');    
    Route::post('/createTeacher', 'ZinMyoHtetAungController@createTeacher')->name('createTeacher');
    Route::put('/updateTeacher/{id}', 'ZinMyoHtetAungController@updateTeacher')->name('updateTeacher');
    Route::delete('/deleteTeacher/{id}', 'ZinMyoHtetAungController@deleteTeacher')->name('deleteTeacher');
 });

 Route::group(['prefix'=> '/class'], function(){
    Route::get('/getClasses', 'ZinMyoHtetAungController@getClasses')->name('getClasses');    
    Route::post('/createClass', 'ZinMyoHtetAungController@createClass')->name('createClass');
    Route::put('/updateClass/{id}', 'ZinMyoHtetAungController@updateClass')->name('updateClass');
    Route::delete('/deleteClass/{id}', 'ZinMyoHtetAungController@deleteClass')->name('deleteClass');
 });

