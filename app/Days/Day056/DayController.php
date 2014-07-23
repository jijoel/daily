<?php namespace Days\Day056;

use Auth;
use View;
use Input;
use Validator;
use Redirect;
use BaseController;


class DayController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    protected $blog;
    protected $tags;

    public function __construct(Day056Blog $blog, Day056Tag $tags)
    {
        $this->beforeFilter(function(){
            if (Auth::guest()) return Redirect::route('day056.index');
        }, ['except' => ['index','show']]);

        $this->blog = $blog;
        $this->tags = $tags;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $found = $this->blog->all();

        $this->layout->content = View::make('days.056.index', compact('found'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = $this->tags->get(['title']);

        $this->layout->content = View::make('days.056.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Day056Blog::$rules);

        if (! $validation->passes())
            return Redirect::route('day056.create')
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'There were validation errors.');

        $input['author_id'] = Auth::user()->id;
        $post = $this->blog->create($input);
        $this->loadTags($post);

        return Redirect::route('day056.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $item = $this->blog->findOrFail($id);

        $this->layout->content = View::make('days.056.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $item = $this->blog->find($id);
        $tags = $this->tags->get(['title']);

        if (is_null($item))
        {
            return Redirect::route('day056.index');
        }

        $this->layout->content = View::make('days.056.edit', compact('item','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Day056Blog::$rules);

        if ( ! $validation->passes())
            return Redirect::route('day056.edit', $id)
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'There were validation errors.');
            
        $blog = $this->blog->find($id);
        $blog->update($input);
        $this->loadTags($blog);

        return Redirect::route('day056.show', $id);
    }

    private function loadTags($record)
    {        
        $tags = explode(',', Input::get('tags'));

        $tagsForRecord = array();
        foreach($tags as $userTag) {
            $tag = $this->tags->add($userTag);
            $tagsForRecord[] = $tag->id;
        }
        
        $record->tags()->sync($tagsForRecord);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->blog->find($id)->delete();

        return Redirect::route('day056.index');
    }

}
