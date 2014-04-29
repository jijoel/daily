<?php



/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
    Log::error($exception);
});

// Note: Errors will fire in reverse order, so more detailed should go on bottom

App::error(function(Days\Day046\FormValidationException $exception, $code)
{
    return Redirect::back()->withInput()->withErrors($exception->getErrors());
});

App::error(function(Days\Day046\AjaxFormValidationException $exception, $code)
{
    // TODO: Include error state and error message
    return $exception->getErrors();
});

