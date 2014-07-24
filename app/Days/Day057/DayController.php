<?php namespace Days\Day057;

use View;
use Input;
use Image;
use BaseController;

class DayController extends BaseController 
{
    const THUMB_SIZE = 150;

    protected $layout = 'layouts.bootstrap3';
    protected $image = '/img/day.jpg';
    
    public function index()
    {
        $this->layout->content = View::make('days.057.index')
            ->with([
                'image'=>$this->image, 
                'thumb'=>null, 
                'size'=>self::THUMB_SIZE,
                'select'=>json_encode([0,0,100,100]),
            ]);
    }

    public function store()
    {
        $image = Image::make(public_path().$this->image);
        $coords = json_decode(Input::get('coords'));

        $thumb = $this->generateThumbnail($image, $coords);

        $this->layout->content = View::make('days.057.index')
            ->with([
                'image' => $this->image, 
                'thumb' => (string) $thumb->encode('data-url'), 
                'size' => self::THUMB_SIZE,
                'select' => json_encode([$coords->x, $coords->y, $coords->x2, $coords->y2]),
            ]);

    }

    protected function generateThumbnail($image, $coords)
    {
        $widthMultiplier = $image->width() / $coords->dw;
        $heightMultiplier = $image->height() / $coords->dh;

        return $image->crop( 
            (int)($coords->w * $widthMultiplier),
            (int)($coords->h * $heightMultiplier),
            (int)($coords->x * $widthMultiplier),
            (int)($coords->y * $heightMultiplier)
        )->resize(self::THUMB_SIZE, Null, function($c){
            $c->aspectRatio();
        });
    }
}

