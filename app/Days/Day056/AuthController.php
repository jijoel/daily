<?php namespace Days\Day056;

use Auth;
use Input;
use Redirect;
use BaseController;


class AuthController extends BaseController 
{
    public function login()
    {
        Auth::logout();

        $credentials = array_only(Input::all(), ['username','password']);

        if ( ! Auth::attempt($credentials)) {
            return Redirect::back()
                ->withInput()
                ->withErrors(array('Invalid Credentials'));
        }

        return Redirect::back();
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::back();
    }

}

