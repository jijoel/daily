<?php

class ExampleTest extends TestCase 
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($this->client->getResponse()->isOk());
    }


    // public function testDateRange()
    // {
    //     $date = KDate::make('now');
    //     var_dump($date->start_title);

    //     $date = KDate::make(Kalani\DateRange\DateRange::NONE);
    //     var_dump($date->start);

    //     $date = KDate::make(KDate::none());
    //     var_dump($date->start);

    //     $date = KDate::make('today');
    //     var_dump($date->short);

    //     $date = KDate::make('today','tomorrow');
    //     var_dump($date->short);

    //     $date = KDate::make('today','next Friday');
    //     var_dump($date->short);

    //     $date = KDate::make('today','last day of this month');
    //     var_dump($date->short);

    //     var_dump($date->short_title);
    //     var_dump($date->start_title);
    //     var_dump($date->title);

    //     // $date = KDate::make('today','Halloween');
    //     // var_dump($date->title);

    //     $date = KDate::make('third Monday of February');
    //     var_dump($date->title);
    // }

}