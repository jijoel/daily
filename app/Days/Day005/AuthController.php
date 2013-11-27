<?php namespace Days\Day005;

use Auth;
use View;
use Input;
use OAuth;
use Redirect;
use Response;
use BaseController;


class AuthController extends BaseController
{
    protected $layout = 'layouts.main';

    public function __construct()
    {
        View::share(array('day'=>5, 'dayTitle'=>'OAuth Login'));
    }   

    public function getLogin()
    {
        $this->layout->content = View::make('days.005.login');
    }

    public function loginWithGoogle()
    {
        // get data from input
        $code = Input::get( 'code' );

        // get google service
        $googleService = OAuth::consumer( 'Google' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

            $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            echo $message. "<br/>";

            //Var_dump
            //display whole array().
            dd($result);

        }

        // if not ask for permission first
        else {

            dd($result);

            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to google login url
            return Response::make()->header( 'Location', (string)$url );
        }

    }

    public function postLogin()
    {
        $this->loginWithGoogle();
    }

    public function getLogout()
    {
        Auth::logout();

        return Redirect::route('day005_login')
            ->withMessage('You have been logged out');
    }

}
