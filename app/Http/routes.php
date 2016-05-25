<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="HomeController">
Route::any('/', ['as' => 'login','uses' => 'HomeController@index']);
Route::any('/dashboard', ['as' => 'dashboard','uses' => 'HomeController@dashboard']);
Route::get('/scorecards', ['as' => 'scorecards','uses' => 'HomeController@scorecards']);
Route::any('/editscorecard/{id?}/{action?}/', ['as' => 'editscorecard','uses' => 'HomeController@editscorecard']);
Route::get('/categories', ['as' => 'categories','uses' => 'HomeController@categories']);


//</editor-fold>