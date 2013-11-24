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
