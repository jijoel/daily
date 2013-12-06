<?php namespace Days\Day005;

use View;
use Input;
use OAuth;
use Config;
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


    public function postLogin()
    {
        return $this->loginWithGoogle();
    }

    public function getLogout()
    {
        return Redirect::route('day005_login')
            ->withMessage('You have been logged out');
    }

    public function loginWithGoogle()
    {
        if ($err = Input::get('error')) {
            $this->layout->content = View::make('days.005.fail')
                ->with('message', $err);
            return;
        }

        $code = Input::get( 'code' );
        $callback = Config::get('oauth-4-laravel::consumers.google.callback_url');
        $googleService = OAuth::consumer( 'google', $callback );

        if ( empty( $code ) ) {
            // Ask for a code from google
            $url = $googleService->getAuthorizationUri(['approval_prompt'=>'force']);
            return Response::make()->header( 'Location', (string)$url );
        }

        // if code is provided get user data and sign in

        // This was a callback request from google, get the token
        $token = $googleService->requestAccessToken( $code );

        // TODO: verify that it's valid...

        // Send a request
        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

        $this->layout->content = View::make('days.005.yay')
            ->with('result', $result);
    }

}
