<?php namespace Days\Day007;

use View;
use Input;
use Redirect;
use Validator;
use BaseController;


class TodosController extends BaseController
{
    protected $layout = 'layouts.main';

    public function __construct(TodoInterface $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $this->layout->js = View::make('days.day007.scripts');
        $this->layout->content = View::make('days.day007.index')
            ->with('items', $this->model->paginate(5));
    }

    public function store()
    {
        $input = array_only(Input::all(), array('item'));
        $rules = array(
            'item' => 'required|max:80',
        );

        $toIndex = get_class($this).'@index';
        $validation = Validator::make($input, $rules);
        if ($validation->passes()) {
            $this->model->create($input);
            return Redirect::action($toIndex);
        }

        return Redirect::action($toIndex)
            ->withInput()
            ->withErrors($validation->errors());
    }

    public function destroy($id)
    {
        $found = $this->model->findOrFail($id);

        $found->delete();
    }

}