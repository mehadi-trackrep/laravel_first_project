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

Route::group(['middleware'=>'auth'], function(){

	Route::get('/', function () {
	    //return view('welcome');
	    return view('frontpage');
	});

	Route::get('/notebooks', ['as'=>'notebooks.index', 'uses'=>'NotebooksController@index']); // only for showing vlaue
	Route::post('/notebooks', 'NotebooksController@store'); // only for stroing value wrt post method 
	Route::get('/notebooks/create', 'NotebooksController@create');
	Route::get('/notebooks/{notebook}', 'NotebooksController@edit');
	Route::put('/notebooks/{notebook}', 'NotebooksController@update');
	Route::delete('/notebooks/{notebook}', 'NotebooksController@destroy');

});




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
