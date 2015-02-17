<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to("recipes");
});

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::get('dashboard', 'SessionsController@show');
Route::get('register', 'UsersController@create');

Route::resource('users', 'UsersController');
Route::resource('sessions', 'SessionsController');

Route::resource('recipes', 'RecipesController');
Route::resource('ingredients', 'IngredientsController');
Route::resource('steps', 'StepsController');
Route::resource('comments', 'CommentsController');