<?php namespace Days\Day016;

use View;
use Input;
use BaseController;
use RangeException;
use Days\Day016\BowlingGame\BowlingGame;


class BowlingGameController extends BaseController
{
    protected $layout = 'layouts.multipage';

    public function __construct(BowlingGame $game)
    {
        $this->game = $game;
    }

    public function index()
    {
        $balls = array_fill(0, 22, '');
        $score = 0;
        $error = '';

        $this->layout->content = View::make('days.016.index')
            ->with(compact('balls', 'score', 'error'));
    }

    public function store()
    {   
        $balls = Input::get('ball');
        $score = 0;
        $error = '';

        try {
            foreach($balls as $ball) {
                $this->game->roll($ball);
            }
            $score = $this->game->score();            
        } catch (RangeException $e) {
            $error = 'Please enter a number between 1 and 10';
        }

        $this->layout->content = View::make('days.016.index')
            ->with(compact('balls', 'score', 'error'));
    }

}
