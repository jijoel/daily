<?php namespace Days\Day058;

use View;
use Input;
use BaseController;

class DayController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';

    protected $types = array(
        'Guest' => [
            'B'   => 'Bungalow',
            'LP'  => 'Lodge Private Bath',
            'LS'  => 'Lodge Share Bath',
            'OC'  => 'Ocean Cottage',
            'OL'  => 'Ocean Loft',
            'TC'  => 'Tropical Cottage',
            'TH'  => 'Tree House',
            'TL'  => 'Tropical Loft',
            'CO'  => 'Overflow',
            'XS'  => 'Offsite',
        ],
        'Staff' => [
            'C'   => 'Campsite',
            'S'   => 'Staff',
            'SA'  => 'Staff A-Frame',
            'SC'  => 'Staff Campsite',
            'SG'  => 'Staff Guest',
            'SM'  => 'Staff/Manager Housing',
            'SO'  => 'Staff Other'
        ],
        'Misc' => [
            'X' => 'Closed',
            'F' => 'Facilities'
        ],
    );
    
    public function index()
    {
        $types = $this->types;
        $selected = $this->getCurrentSelection();

        $this->layout->content = View::make('days.058.index')
            ->with(compact('types','selected'));
    }

    private function getCurrentSelection()
    {
        if (Input::has('types'))
            return explode(',', Input::get('types'));

        return ['B','LP','LS','OC','OL','TC','TL','TH'];
    }

}

