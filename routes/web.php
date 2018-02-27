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

Route::resource('users','UsersController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home','AdminController@index')->middleware('IsAdmin');

Route::get('admin/skills','SkillController@index')->middleware('IsAdmin');

//Route::get('admin/create_skills','SkillController@create')->middleware('IsAdmin');
Route::get('admin/create_skills','SkillController@create')->middleware('IsAdmin');
Route::post('admin/create_skills','SkillController@store')->name('store')->middleware('IsAdmin');
Route::get('admin/show_skills','SkillController@index')->middleware('IsAdmin');
Route::get('admin/delete/{skill}','SkillController@destroy')->middleware('IsAdmin');