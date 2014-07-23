<?php namespace Days\Day056;

use Auth;
use View;
use Input;
use Validator;
use Redirect;
use BaseController;


class TagController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    protected $tags;

    public function __construct(Day056Tag $tags)
    {
        $this->beforeFilter(function(){
            if (Auth::guest()) return Redirect::route('day056.index');
        }, ['except' => ['index','show']]);

        $this->tags = $tags;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $found = $this->tags->orderBy('title')->get();

        $this->layout->content = View::make('days.056.tag-index', compact('found'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $tag = $this->tags->find($id);

        $tag->articles()->sync([]);
        $tag->delete();

        return Redirect::to('/day056/tags/');
    }

}
