<?php namespace Days\Day017;

use View;
use BaseController;


class FieldTypesController extends BaseController
{
    protected $layout = 'layouts.multipage';
    protected $data = array(
        'default-text'  =>  'default',
        'autogrow-text' =>  'this field will expand to fit content',
        'url'           =>  'http://daily.kumuwai.com',
    );

    public function index()
    {
        $this->layout->js  = View::make('days.017.js');
        $this->layout->content = View::make('days.017.index')
            ->with('data', $this->data);
    }

}
