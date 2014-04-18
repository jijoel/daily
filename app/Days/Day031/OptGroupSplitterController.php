<?php namespace Days\Day031;

use View;
use BaseController;
use Days\Day031\OptGroupSplitter;

class OptGroupSplitterController extends BaseController 
{
    protected $layout = 'layouts.multipage';
    
    protected $data = array(
        array('id'=>1, 'title'=>'first',  'group'=>'A'),
        array('id'=>2, 'title'=>'second', 'group'=>'B'),
        array('id'=>3, 'title'=>'third',  'group'=>'A'),
        array('id'=>4, 'title'=>'fourth',  'group'=>'B'),
    );

    public function index()
    {
        $data = OptGroupSplitter::split($this->data, 'title', 'id', 'group');

        $this->layout->content = View::make('days.031.index')
            ->with('data', $data);
    }

}

