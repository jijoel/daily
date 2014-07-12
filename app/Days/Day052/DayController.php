<?php namespace Days\Day052;

use View;
use Input;
use BaseController;
use Carbon\Carbon;
use Days\Support\DataTransferObject;


class DayController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    protected $date;

    public function index()
    {
        $this->date = Carbon::now();
        $this->loadContent();
    }

    public function store()
    {
        $this->date = Carbon::parse(Input::get('date'));
        $this->loadContent();
    }

    private function loadContent()
    {
        $data = $this->generateContent([
            'toDateString',
            'toFormattedDateString',
            'toTimeString',
            'toDateTimeString',
            'toDayDateTimeString',
            'toATOMString',
            'toCOOKIEString',
            'toISO8601String',
            'toRFC822String',
            'toRFC850String',
            'toRFC1036String',
            'toRFC1123String',
            'toRFC2822String',
            'toRFC3339String',
            'toRSSString',
            'toW3CString',
        ]);
        $date = $this->date->format('Y-m-d H:i:s T');

        $this->layout->content = View::make('days.052.index')
            ->with(compact('data','date'));
    }

    private function generateContent($items)
    {
        $content = array();

        foreach($items as $item)
            $content[] = new DataTransferObject(['method'=>$item,'result'=>$this->date->$item()]);

        return $content;
    }

}

