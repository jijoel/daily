<?php namespace Days\Day040;

use Str;
use URL;
use View;
use Form;
use Input;
use Session;
use Redirect;
use Validator;
use BaseController;

class Bootstrap8Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    protected $rules = array(
        'first' => array(
            'f1' => 'required',
            'f2' => 'required|min:2',
            'f3' => 'required',
        ),
        'second' => array(
            'f1' => 'required|min:4|max:6',
        ),
    );

    public function index()
    {
        $this->setupFormMacros();
        $url = URL::action(get_class($this).'@store');
        $this->layout->content = View::make('days.040.index')->withUrl($url);
    }

    public function show($page)
    {
        $this->setupFormMacros();
        $url = URL::action(get_class($this).'@store');
        return View::make("days.040.$page")->withUrl($url);
    }

    public function store()
    {
        sleep(1);
        $page = Input::get('page');

        if (!isset($this->rules[$page]))
            return;

        $valid = Validator::make(Input::get($page), $this->rules[$page]);

        $url = URL::action(get_class($this).'@show', $page);
        return Redirect::to($url)->withInput()->withErrors($valid);
    }

    private function setupFormMacros()
    {
        Form::macro('wizard_pane', function($id, $content) {
            return '<div class="tab-pane" id="'.$id.'">'
                  . '<div class="content">'
                  . $content
                  . '</div>'
                  . View::make('partials.angular-wizard-pager')->render()
                  . '</div>';
        });

        Form::macro('wizard_text', function($page, $name, $label=Null, $help=Null){
            if (! $label)
                $label = Str::title($name); 

            $str = '';

            $errors = Session::get('errors');

            if ($errors && $errors->has($name))
                $str .= '<div class="form-group has-error">';
            else
                $str .= '<div class="form-group">';

            $str .= Form::label($page.'['.$name.']', $label, ['class'=>'col-md-2 control-label']);
            $str .= '<div class="col-md-10">';
            $str .= Form::text($page.'['.$name.']', Null, ['class'=>'form-control']);

            if ($errors && $errors->has($name))
                $str .= '<span class="help-block">'.$errors->first($name).'</span>';
            elseif ($help)
                $str .= '<span class="help-block">'.$help.'</span>';

            $str .= '</div>';       // col-md-10
            $str .= '</div>';       // form-group
            return $str;
        });

    }
}



