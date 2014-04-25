<?php namespace Days\Day044;

use View;
use Input;
use Image;
use Redirect;
use Validator;
use BaseController;

class FileUploadController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    protected $rules = array(
        'title' => 'required|max:80',
        'thumbnail' => 'required|image',
    );

    public function index()
    {
        $this->layout->content = View::make('days.044.index')
            ->with('files', Day044File::paginate(20));
    }

    public function store()
    {
        $filename = '';

        $validation = Validator::make(Input::all(), $this->rules);
        if ($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }

        if (Input::hasFile('thumbnail')) {
            $file = Input::file('thumbnail');
            $filename = time().'-'.$file->getClientOriginalName();
            
            $image = Image::make($file->getRealPath())
                ->resize(300,200,true,false)
                ->save(public_path().'/day044_files/'.$filename);
        }

        $record = new Day044File;
        $record->title = Input::get('title');
        $record->thumbnail = $filename;
        $record->save();

        return $this->index();
    }
}

