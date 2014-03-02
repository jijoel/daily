<?php namespace Days\Day032;

use View;
use Input;
use Mail;
use Session;
use BaseController;

class MailerController extends BaseController 
{
    protected $layout = 'layouts.multipage';
    
    public function index()
    {
        $this->layout->content = View::make('days.032.index');
    }

    public function store()
    {
        Mail::send('days.032.mail', Input::all(), function($message){
            $message->to('joel@kalani.com')
                ->subject(Input::get('subject'));
        });

        Session::put('message', 'Mail has been sent');
        $this->layout->content = View::make('days.032.index');
    }
}

