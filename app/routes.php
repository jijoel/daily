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

// Day 27 --------------------------------------------------------
View::composer('days.027.index', 'Days\Support\MultiPageComposer');
Route::resource('day027', 'Days\Day027\AngularListDetailController',
    array('only'=>array('index')));

// Day 28 --------------------------------------------------------
Route::resource('day028', 'Days\Day028\D3DemoController',
    array('only'=>array('index')));

// Day 29 ---------------------------------------------------------
View::composer('layouts.angular', 'Days\Support\MultiPageComposer');
Route::get('day029', 'Days\Day029\AngularGridController@getContainer');

// Day 30 --------------------------------------------------------
Route::resource('day030', 'Days\Day030\D3TestController',
    array('only'=>array('index')));

// Day 31 --------------------------------------------------------
Route::resource('day031', 'Days\Day031\OptGroupSplitterController',
    array('only'=>array('index')));

// Day 32 --------------------------------------------------------
Route::resource('day032', 'Days\Day032\MailerController',
    array('only'=>array('index','store')));

// Day 33 --------------------------------------------------------
View::composer('layouts.bootstrap3', 'Days\Support\MultiPageComposer');
Route::resource('day033', 'Days\Day033\Bootstrap1Controller',
    array('only'=>array('index','store')));

// Day 34 --------------------------------------------------------
Route::resource('day034', 'Days\Day034\Bootstrap2Controller',
    array('only'=>array('index','store')));

// Day 35 --------------------------------------------------------
Route::get('day035', 'Days\Day035\Bootstrap3Controller@index');

// Day 36 --------------------------------------------------------
Route::get('day036', 'Days\Day036\Bootstrap4Controller@index');

// Day 37 --------------------------------------------------------
Route::get('day037', 'Days\Day037\Bootstrap5Controller@index');

// Day 38 --------------------------------------------------------
Route::get('day038', 'Days\Day038\Bootstrap6Controller@index');

// Day 39 --------------------------------------------------------
Route::resource('day039', 'Days\Day039\Bootstrap7Controller',
    array('only'=>array('index','store','show')));

// Day 40 --------------------------------------------------------
View::composer('partials.github', 'Days\Support\PaddedDayComposer');
Route::resource('day040', 'Days\Day040\Bootstrap8Controller',
    array('only'=>array('index','store','show')));

// Day 41 --------------------------------------------------------
Route::get('day041', 'Days\Day041\Bootstrap9Controller@index');

// Day 42 --------------------------------------------------------
Route::resource('day042', 'Days\Day042\Bootstrap10Controller',
    array('only'=>array('index','store','show')));

// Day 43 --------------------------------------------------------
Route::resource('day043', 'Days\Day043\Select2Controller',
    array('only'=>array('index','store')));

// Day 44 --------------------------------------------------------
Route::resource('day044', 'Days\Day044\FileUploadController',
    array('only'=>array('index','store','destroy')));

// Day 45 --------------------------------------------------------
Route::resource('day045', 'Days\Day045\AjaxFormController',
    array('only'=>array('index','store')));

// Index/Store only ----------------------------------------------
foreach(['046', '047'] as $index) {
    Route::resource("day$index", "Days\Day$index\DayController",
        array('only'=>array('index','store')));    
}

// Index/Store/Destroy Only ---------------------------------------
foreach(['048'] as $index) {
    Route::resource("day$index", "Days\Day$index\DayController",
        array('only'=>array('index','store','destroy')));
}

