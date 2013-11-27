<?php namespace Days\Day005;

use View;
use BaseController;


class DashboardController extends BaseController
{
    protected $layout = 'layouts.main';

    public function __construct()
    {
        View::share(array('day'=>5, 'dayTitle'=>'Success!'));
    }   

    public function index()
    {
        $this->layout->content = View::make('days.005.yay');
    }
}