<?php namespace Days\Day049;

use View;
use Input;
use Image;
use Lang;
use Redirect;
use Response;
use Validator;
use BaseController;
use Days\Day044\Day044File;


class DayController extends BaseController 
{
    const FILE_PATH = '/days/day044/';

    protected $layout = 'layouts.bootstrap3';
    
    protected $rules = array(
        'title' => 'required|max:80',
        'thumbnail' => 'required|image',
    );
    
    public function index()
    {
        $this->layout->content = View::make('days.049.index')
            ->with('files', Day044File::paginate(7));
    }


    public function store()
    {
        $filename = '';

        $validation = Validator::make(Input::all(), $this->rules);
        if ($validation->fails()) {
            return Response::json([
                'success'=>false,
                'message'=>View::make('days.049.error')
                    ->withErrors($validation->errors())->render(),
            ]);
        }

        if (Input::hasFile('thumbnail')) {
            $file = Input::file('thumbnail');
            $filename = time().'-'.$file->getClientOriginalName();
            
            $image = Image::make($file->getRealPath())
                ->resize(300,200,true,false)
                ->save(public_path().self::FILE_PATH.$filename);
        }

        $record = new Day044File;
        $record->title = Input::get('title');
        $record->thumbnail = $filename;
        $record->save();

        return Response::json([
            'success'=>true,
            'message'=>View::make('days.049.item')
                ->withFile($record)->render(),
        ]);
    }

    public function destroy($id)
    {
        $found = Day044File::findOrFail($id);
        try {
            unlink(public_path().self::FILE_PATH.$found->thumbnail);
        } catch (ErrorException $e) {}

        $found->delete();
    }
}
