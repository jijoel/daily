<?php namespace Days\Day003;

use Input;
use View;
use Validator;
use Days\Day002\Roman;


class RomanController extends \BaseController
{
    protected $layout = 'layouts.main';
    protected $converter;

    public function __construct(Roman $converter)
    {
        $this->converter = $converter; 
        View::share(array('day'=>2, 'dayTitle'=>'Roman Revisited'));
    }
    
    public function index()
    {
        $this->layout->content = View::make('days.003.index')
            ->with('decimal', '');
    }

    public function store()
    {
        $rules = array(
            'decimal' => 'required|integer|max:3999',
        );

        $decimal = Input::get('decimal');
        $validator = Validator::make(array('decimal'=>$decimal), $rules);

        if( ! $validator->passes()) {
            $this->layout->content = View::make('days.003.index')
                ->withErrors($validator->errors())
                ->withDecimal($decimal);
            return;
        }

        $roman = $this->converter->convertToRoman($decimal);
        $this->layout->content = View::make('days.003.index')
            ->with('decimal', $decimal)
            ->with('roman', $roman);
    }

}

