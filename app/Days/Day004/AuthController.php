<?php namespace Days\Day004;

use Auth;
use View;
use Input;
use Redirect;
use BaseController;


class AuthController extends BaseController
{
    protected $layout = 'layouts.main';

    public function __construct()
    {
        View::share(array('day'=>4, 'dayTitle'=>'Login'));
    }   

    public function getLogin()
    {
        $this->layout->content = View::make('days.004.login')
            ->with('username','');
    }

    public function postLogin()
    {
        $credentials = array_only(Input::all(), ['username','password']);

        if (Auth::attempt($credentials)) {
            return Redirect::route('day004_dashboard');
        }

        return Redirect::route('day004_login')
            ->withInput()
            ->withErrors(array('Invalid Credentials'));
    }

    public function getLogout()
    {
        Auth::logout();

        return Redirect::route('day004_login')
            ->withMessage('You have been logged out');
    }

}
