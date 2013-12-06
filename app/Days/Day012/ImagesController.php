<?php namespace Days\Day012;

use BaseController;
use View;
use Image;
use Input;
use Response;
use Validator;
use Redirect;
use Days\Day009\TodosAdapterInterface;


class ImagesController extends BaseController 
{
    protected $layout = 'layouts.multipage';

    public function index()
    {
        $this->layout->content = View::make('days.012.index');
        $this->layout->css = View::make('days.012.css');
        $this->layout->js = View::make('days.012.js');
    }

    public function store()
    {
        $input = array(
            'left'           => Input::get('x'), 
            'top'            => Input::get('y'), 
            'width'          => Input::get('w'), 
            'height'         => Input::get('h'), 
            'displayWidth'   => Input::get('dw'), 
            'displayHeight'  => Input::get('dh'),
        );
        $sourceImage = realpath(
            base_path().'/public/'.Input::get('img'));
        $image = Image::make($sourceImage);

        $widthMultiplier = $image->width / $input['displayWidth'];
        $heightMultiplier = $image->height / $input['displayHeight'];

        $image->crop( 
            $input['width']  * $widthMultiplier,
            $input['height'] * $heightMultiplier,
            $input['left']   * $widthMultiplier,
            $input['top']    * $heightMultiplier
        )->resize(150, Null, True);

        return Response::make($image, 200, array('Content-Type' => 'image/jpeg'));
    }

    public function show($id=Null)
    {
        $this->layout->content = View::make('days.012.show');
        $this->layout->css = View::make('days.012.css');
        $this->layout->js = View::make('days.012.js');
    }

}
