<?php namespace Days\Day020;

use Auth;
use Redirect;
use Response;
use View;
use Input;
use Session;
use BaseController;

class AuthController extends BaseController 
{
    protected $layout = 'layouts.multipage';

    public function getLogout()
    {
        Auth::logout();

        return Redirect::route('day020')
            ->withMessage('You have been logged out');
    }

    public function postLogin()
    {
        $credentials = array_only(Input::all(), ['username','password']);

        if (Auth::attempt($credentials)) {
            return Redirect::route('day020')
                ->withMessage("You have been logged in as {$credentials['username']}");
        }

        Session::flashInput(Input::all());
        $this->layout->content = View::make('days.020.index')
            ->withMessage('Invalid username or password');

        return Response::make($this->layout,403);
    }
}

