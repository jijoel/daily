<?php namespace Days\Day013;

use BaseController;
use View;
use Image;
use Input;
use Response;
use Redirect;
use Session;


class ImagesController extends BaseController 
{
    const THUMBNAIL_WIDTH = 150;
    const STATUS_OK = 200;

    protected $layout = 'layouts.multipage';
    protected $resultImage;
    protected $token;

    public function index()
    {
        $this->layout->content = View::make('days.013.index');
        $this->layout->css = View::make('days.013.css');
        $this->layout->js = View::make('days.013.js');
    }

    public function store()
    {
        $input = $this->getSubmittedValuesAsArray();
        $image = $this->getSourceImage();
        $thumb = $this->generateThumbnail($image, $input);
        $this->storeImage($thumb);

        return Redirect::action(get_class($this).'@show', 'result');
    }

    protected function storeImage($image)
    {
        Session::put('image', Response::make(
            $image, 
            self::STATUS_OK, 
            array('Content-Type' => 'image/jpeg'))
        );
    }

    public function show($id=Null)
    {
        // $this->layout->content = View::make('testing.content');
        $this->layout->content = View::make('days.013.show');
        $this->layout->css = View::make('days.013.css');
        $this->layout->js = View::make('days.013.js');
    }

    public function getImage()
    {
        return Session::get('image');
    }

    protected function getSubmittedValuesAsArray()
    {
        return array(
            'left'           => Input::get('x'), 
            'top'            => Input::get('y'), 
            'width'          => Input::get('w'), 
            'height'         => Input::get('h'), 
            'displayWidth'   => Input::get('dw'), 
            'displayHeight'  => Input::get('dh'),
        );
    }

    protected function getSourceImage()
    {
        $sourceImage = realpath(
            base_path().'/public/'.Input::get('img'));
        return Image::make($sourceImage);
    }

    protected function generateThumbnail($image, $params)
    {
        $widthMultiplier = $image->width / $params['displayWidth'];
        $heightMultiplier = $image->height / $params['displayHeight'];

        return $image->crop( 
            $params['width']  * $widthMultiplier,
            $params['height'] * $heightMultiplier,
            $params['left']   * $widthMultiplier,
            $params['top']    * $heightMultiplier
        )->resize(self::THUMBNAIL_WIDTH, Null, True);
    }

}
