<?php namespace Days\Day042;

use URL;
use View;
use Input;
use Validator;
use Redirect;
use BaseController;

class Bootstrap10Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';

    protected $pages = array(
        'p0' => ['view'=>'form0', 'title'=>'Intro'],
        'p1' => ['view'=>'form1', 'title' => 'First Page'],
        'p2' => ['view'=>'form2', 'title' => 'Second Page'],
        'p3' => ['view'=>'form3', 'title' => 'Final'],
    );

    protected $rules = array(
        'p0' => array(),
        'p1' => array(
            'f1' => 'required',
            'f2' => 'required|min:2',
            'f3' => 'required',
        ),
        'p2' => array(
            'f1' => 'required|min:4|max:6',
        ),
        'p3' => array(),
    );
    
    public function index()
    {
        $url = URL::action(get_class($this).'@store');

        $this->layout->content = View::make('days.042.index')
            ->withPages($this->pages)->withUrl($url);
    }

    public function show($page)
    {
        try {
            $url = URL::action(get_class($this).'@store');
            return View::make('days.042.'.$this->pages[$page]['view'])->withUrl($url);
        } catch (Exception $e) {
            return 'Error showing page '.$page;
        }
    }

    public function store()
    {
        $page = Input::get('page');
        $data = Input::get($page, array());
        $rules = isset($this->rules[$page]) ? $this->rules[$page] : array();
        $validation = Validator::make($data, $this->rules[$page]);

        // TODO: Store data here...
        
        $url = URL::action(get_class($this).'@show', $page);

        if ($validation->fails())
            return Redirect::to($url)->withInput()->withErrors($validation);

        return Redirect::to($url)->withInput()->withSuccess('Data successfully stored');
    }
}

