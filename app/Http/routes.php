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
//<editor-fold defaultstate="collapsed" desc="index">
Route::any('/', ['as' => 'login','uses' => 'HomeController@index']);
Route::any('/dashboard', ['as' => 'dashboard','uses' => 'HomeController@dashboard']);
Route::any('/fileupload', ['as' => 'fileupload','uses' => 'HomeController@fileupload']);
//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="scorecards">
Route::get('/scorecards', ['as' => 'scorecards','uses' => 'HomeController@scorecards']);
Route::any('/editscorecard/{id?}/{action?}/', ['as' => 'editscorecard','uses' => 'HomeController@editscorecard']);

//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="categories">
Route::get('/categories', ['as' => 'categories','uses' => 'HomeController@categories']);
Route::any('/editcategories/{id?}/{action?}/', ['as' => 'editcategories','uses' => 'HomeController@editcategories']);
Route::any('/addcategory', ['as' => 'addcategory','uses' => 'HomeController@addcategory']);

//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="Weights">
Route::get('/weights', ['as' => 'weights','uses' => 'HomeController@weights']);
Route::any('/editweights/{id?}/{action?}/', ['as' => 'editweights','uses' => 'HomeController@editweights']);
Route::any('/addweights', ['as' => 'addweights','uses' => 'HomeController@addweights']);
//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="scorecardparams">
Route::get('/scorecardparams', ['as' => 'scorecardparams','uses' => 'HomeController@scorecardparams']);
Route::any('/editscorecardparams/{id?}/{action?}/', ['as' => 'editscorecardparams','uses' => 'HomeController@editscorecardparams']);
Route::any('/addscorecardparams', ['as' => 'addscorecardparams','uses' => 'HomeController@addscorecardparams']);
//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="systemparams">
Route::get('/systemparams', ['as' => 'systemparams','uses' => 'HomeController@systemparams']);
Route::any('/editsystemparams/{id?}/{action?}/', ['as' => 'editsystemparams','uses' => 'HomeController@editsystemparams']);
Route::any('/addsystemparams', ['as' => 'addsystemparams','uses' => 'HomeController@addsystemparams']);

//</editor-fold>
//</editor-fold>

Route::any('/uploadparams', ['as' => 'uploadparams','uses' => 'HomeController@uploadparams']);


//<editor-fold defaultstate="collapsed" desc="uploads">