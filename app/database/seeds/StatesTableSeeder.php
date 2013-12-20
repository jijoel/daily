<?php


class StatesTableSeeder extends Seeder
{    
    protected $data = array(
        array('CA','AB','Alberta'),
        array('US','AK','Alaska'),
        array('US','AL','Alabama'),
        array('US','AR','Arkansas'),
        array('US','AZ','Arizona'),
        array('CA','BC','British Columbia'),
        array('US','CA','California'),
        array('US','CO','Colorado'),
        array('US','CT','Connecticut'),
        array('US','DC','District of Columbia'),
        array('US','DE','Delaware'),
        array('US','FL','Florida'),
        array('US','GA','Georgia'),
        array('US','HI','Hawaii'),
        array('US','IA','Iowa'),
        array('US','ID','Idaho'),
        array('US','IL','Illinois'),
        array('US','IN','Indiana'),
        array('US','KS','Kansas'),
        array('US','KY','Kentucky'),
        array('US','LA','Louisiana'),
        array('US','MA','Massachusetts'),
        array('CA','MB','Manitoba'),
        array('US','MD','Maryland'),
        array('US','ME','Maine'),
        array('US','MI','Michigan'),
        array('US','MN','Minnesota'),
        array('US','MO','Missouri'),
        array('US','MS','Mississippi'),
        array('US','MT','Montana'),
        array('CA','NB','New Brunswick'),
        array('US','NC','North Carolina'),
        array('US','ND','North Dakota'),
        array('US','NE','Nebraska'),
        array('US','NH','New Hampshire'),
        array('US','NJ','New Jersey'),
        array('CA','NL','Newfoundland and Labrador'),
        array('US','NM','New Mexico'),
        array('CA','NS','Nova Scotia'),
        array('CA','NT','Northwest Territories'),
        array('CA','NU','Nunavut'),
        array('US','NV','Nevada'),
        array('US','NY','New York'),
        array('US','OH','Ohio'),
        array('US','OK','Oklahoma'),
        array('CA','ON','Ontario'),
        array('US','OR','Oregon'),
        array('US','PA','Pennsylvania'),
        array('US','PE','Prince Edward Island'),
        array('CA','QC','Quebec'),
        array('US','RI','Rhode Island'),
        array('US','SC','South Carolina'),
        array('US','SD','South Dakota'),
        array('CA','SK','Saskatchewan'),
        array('US','TN','Tennessee'),
        array('US','TX','Texas'),
        array('US','UT','Utah'),
        array('US','VA','Virginia'),
        array('US','VT','Vermont'),
        array('US','WA','Washington'),
        array('US','WI','Wisconsin'),
        array('US','WV','West Virginia'),
        array('US','WY','Wyoming'),
        array('CA','YT','Yukon'),
    );

    public function run()
    {
    	DB::table('states')->delete();

        $items = array();
        foreach($this->data as $item) {
            $items[] = array(
                'country_code' => $item[0],
                'state_code'   => $item[1],
                'state_name'   => $item[2],
            );
        }

        DB::table('states')->insert($items);
    }

}

