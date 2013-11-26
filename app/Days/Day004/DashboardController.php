<?php namespace Days\Day004;

use View;
use BaseController;


class DashboardController extends BaseController
{
    protected $layout = 'layouts.main';

    public function __construct()
    {
        View::share(array('day'=>4, 'dayTitle'=>'Success!'));
    }   

    public function index()
    {
        $this->layout->content = View::make('days.004.yay');
    }
}