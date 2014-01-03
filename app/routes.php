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
Route::get('day005_login_google', array(
    'uses'=>'Days\Day005\AuthController@loginWithGoogle'));
Route::get('day005_logout', array('as'=>'day005_logout', 
    'uses'=>'Days\Day005\AuthController@getLogout'));
Route::get('day005_dashboard', array('as'=>'day005_dashboard',
    'before'=>'day005_auth',
    'uses'=>'Days\Day005\DashboardController@index'));

// Day 6 --------------------------------------------------------
View::composer('home', 'Days\Support\HomeComposer');
View::composer('layouts.main', 'Days\Support\DayComposer');
Route::get('day006', function(){
    return View::make('layouts.main')
        ->nest('content', 'days.006.index');
});


// Day 7 --------------------------------------------------------
App::bind('Days\Day007\TodoInterface', 'Days\Day007\Todo');
Route::resource('day007', 'Days\Day007\TodosController',
    array('only'=>array('index','store','destroy')));

// Day 8 --------------------------------------------------------
View::composer('days.008.template', 'Days\Support\DayComposer');
App::bind('Days\Day008\TodoInterface', 'Days\Day008\Todo');
Route::resource('day008', 'Days\Day008\TodosController');

// Day 9 --------------------------------------------------------
View::composer('days.009.template', 'Days\Support\DayComposer');
App::bind('Days\Day009\TodoInterface', 'Days\Day009\Todo');
App::bind('Days\Day009\TodosAdapterInterface', 'Days\Day009\TodosAdapter');
App::bind('Days\Day009\TodoRepositoryInterface', 'Days\Day009\TodoRepository');
Route::resource('day009', 'Days\Day009\TodosController');

// Day 10 --------------------------------------------------------
Route::get('day010', 'Days\Day010\FontController@index');

// Day 11 --------------------------------------------------------
Route::resource('day011', 'Days\Day011\ImagesController',
    array('only'=>array('index')));

// Day 12 --------------------------------------------------------
View::composer('layouts.multipage', 'Days\Support\MultiPageComposer');
Route::resource('day012', 'Days\Day012\ImagesController',
    array('only'=>array('index', 'store', 'show')));

// Day 13 --------------------------------------------------------
Route::resource('day013', 'Days\Day013\ImagesController',
    array('only'=>array('index', 'store', 'show')));
Route::get('/day013/images/result.jpg', 'Days\Day013\ImagesController@getImage');

// Day 14 --------------------------------------------------------
Route::resource('day014', 'Days\Day014\StrController',
    array('only'=>array('index', 'store')));

// Day 15 --------------------------------------------------------
Route::resource('day015', 'Days\Day015\DiamondController',
    array('only'=>array('index', 'store')));

// Day 16 --------------------------------------------------------
Route::resource('day016', 'Days\Day016\BowlingGameController',
    array('only'=>array('index', 'store')));

// Day 17 --------------------------------------------------------
Route::resource('day017', 'Days\Day017\FieldTypesController',
    array('only'=>array('index')));

// Day 18 --------------------------------------------------------
Route::get('day018', 'Days\Day018\AjaxFieldController@index');
Route::get('day018/states', 'Days\Day018\AjaxFieldController@getStates');

// Day 19 --------------------------------------------------------
Route::get('day019', 'Days\Day019\DateTimeFieldsController@index');

// Day 20 ---------------------------------------------------------
View::composer('days.020.index', 'Days\Day020\IndexComposer');
View::composer('days.020.dashboard', 'Days\Day020\DashboardsComposer');
Route::get('day020', array('as'=>'day020', 
    'uses'=>'Days\Day020\DashboardsController@index'));
Route::get('day020/logout', 'Days\Day020\AuthController@getLogout');
Route::post('day020/login', 'Days\Day020\AuthController@postLogin');

// Day 21 --------------------------------------------------------
Route::resource('day021', 'Days\Day021\ColorChartsController',
    array('only'=>array('index', 'store')));

// Day 22 --------------------------------------------------------
Route::resource('day022', 'Days\Day022\FactorsController',
    array('only'=>array('index', 'store')));

// Day 23 --------------------------------------------------------
View::composer('days.023.index', 'Days\Support\MultiPageComposer');
Route::resource('day023', 'Days\Day023\HelloAngularController',
    array('only'=>array('index')));

// Day 24 --------------------------------------------------------
View::composer('days.024.index', 'Days\Support\MultiPageComposer');
Route::resource('day024', 'Days\Day024\AngularShowHideController',
    array('only'=>array('index')));

// Day 25 ---------------------------------------------------------
Route::resource('day025', 'Days\Day025\StringWrapController',
    array('only'=>array('index', 'store')));

// Day 26 ---------------------------------------------------------
App::bind('Days\Day026\TodoInterface', 'Days\Day026\Todo');
View::composer('days.026.index', 'Days\Support\MultiPageComposer');
Route::resource('day026/api', 'Days\Day026\AngularTodoController',
    array('only'=>array('index','store', 'destroy')));
Route::get('day026', 'Days\Day026\AngularTodoController@getContainer');

