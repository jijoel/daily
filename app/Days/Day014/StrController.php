<?php namespace Days\Day014;

use Str;
use View;
use Input;
use BaseController;
use Days\Day014\TableGenerator;

class StrController extends BaseController
{
    protected $layout = 'layouts.multipage';

    public function __construct()
    {
        $this->tableGenerator = new TableGenerator(new Str);
    }

    public function index()
    {
        $this->layout->content = View::make('days.014.index')
            ->with('table', $this->tableGenerator->generateTable());
    }

    public function store()
    {
        $custom = Input::get('custom');

        $this->layout->content = View::make('days.014.index')
            ->with('table', $this->tableGenerator->generateTable($custom));
    }

}
