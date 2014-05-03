<?php namespace Days\Day050;

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

    public function getView()
    {
        $this->layout->content = View::make('days.050.index')
            ->with('files', Day044File::paginate(20));
    }

    public function index()
    {
        return Day044File::all()->toJson();
    }


    public function store()
    {
        $filename = '';

        $validation = Validator::make(Input::all(), $this->rules);
        if ($validation->fails()) {
            return Response::json([
                'success'=>false,
                'errors'=>$validation->errors()->toArray(),
            ]);
        }

        return Response::json([
            'success'=>true,
            'file'=>$this->saveRecord()->toArray(),
        ]);
    }

    private function saveRecord()
    {
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

        return $record;
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
