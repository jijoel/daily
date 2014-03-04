<?php namespace Days\Day032;

use View;
use Input;
use Mail;
use Session;
use Config;
use Redirect;
use Validator;
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
        $rules = array(
            'subject' => 'required|max:80',
            'body'    => 'required|max:1000',
        );

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()) {
            return Redirect::back()
                ->withErrors($validation->errors())
                ->withInput();
        }

        $recipient = Config::get('kumuwai.email');

        Mail::queue('days.032.mail', Input::all(), function($message) use ($recipient) {
            $message->to($recipient)
                ->subject(Input::get('subject'));
        });

        Session::flash('message', 'Mail has been sent');
        $this->layout->content = View::make('days.032.index');
    }
}

