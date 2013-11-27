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

// Day 1 --------------------------------------------------------
Route::get('/', array('as'=>'home', function() {
    return View::make('home');
}));

// Day 2 --------------------------------------------------------
Route::get('/roman', array('as'=>'roman', function(){
    return View::make('layouts.main')
        ->with(array('day'=>2,'dayTitle'=>'Roman Numerals'))
        ->nest('content', 'days.002.roman', array('decimal'=>''));
}));

Route::post('/roman', array('as'=>'roman.store', function(){
    $converter = new Days\Day002\Roman;
    $decimal = Input::get('decimal');
    $roman = $converter->convertToRoman($decimal);
    return View::make('layouts.main')
        ->with(array('day'=>2,'dayTitle'=>'Roman Numerals'))
        ->nest('content', 'days.002.roman', array(
            'roman'=>$roman, 
            'decimal'=>$decimal));
}));

// Day3 ---------------------------------------------------------
Route::resource('/roman2', 'Days\Day003\RomanController', array(
    'only'=>array('index', 'store')));

// Day 4 ---------------------------------------------------------
Route::filter('day004_auth', function()
{
    if (Auth::guest()) return Redirect::guest('day004_login');
});
Route::get('day004_login', array('as'=>'day004_login', 
    'uses'=>'Days\Day004\AuthController@getLogin'));
Route::post('day004_login', array(
    'uses'=>'Days\Day004\AuthController@postLogin'));
Route::get('day004_logout', array('as'=>'day004_logout', 
    'uses'=>'Days\Day004\AuthController@getLogout'));
Route::get('day004_dashboard', array('as'=>'day004_dashboard',
    'before'=>'day004_auth',
    'uses'=>'Days\Day004\DashboardController@index'));

// Day 5 --------------------------------------------------------
Route::filter('day005_auth', function()
{
    if (Auth::guest()) return Redirect::guest('day005_login');
});
Route::get('day005_login', array('as'=>'day005_login', 
    'uses'=>'Days\Day005\AuthController@getLogin'));
Route::get('day005_google', array(
    'uses'=>'Days\Day005\AuthController@loginWithGoogle'));
Route::get('day005_logout', array('as'=>'day005_logout', 
    'uses'=>'Days\Day005\AuthController@getLogout'));
Route::get('day005_dashboard', array('as'=>'day005_dashboard',
    'before'=>'day005_auth',
    'uses'=>'Days\Day005\DashboardController@index'));

