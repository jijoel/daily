<?php namespace Days\Day055;

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

    public function __construct(Day055Blog $blog)
    {
        $this->beforeFilter(function(){
            if (Auth::guest()) return Redirect::route('day055.index');
        }, ['except' => ['index','show']]);

        $this->blog = $blog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $found = $this->blog->all();

        $this->layout->content = View::make('days.055.index', compact('found'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->content = View::make('days.055.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Day055Blog::$rules);

        if ($validation->passes())
        {
            $input['author_id'] = Auth::user()->id;
            $this->blog->create($input);
            return Redirect::route('day055.index');
        }

        return Redirect::route('day055.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
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

        $this->layout->content = View::make('days.055.show', compact('item'));
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

        if (is_null($item))
        {
            return Redirect::route('day055.index');
        }

        $this->layout->content = View::make('days.055.edit', compact('item'));
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
        $validation = Validator::make($input, Day055Blog::$rules);

        if ($validation->passes())
        {
            $blog = $this->blog->find($id);
            $blog->update($input);

            return Redirect::route('day055.show', $id);
        }

        return Redirect::route('day055.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
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

        return Redirect::route('day055.index');
    }

}
