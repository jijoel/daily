<?php
use \TestGuy;


class Day006_ComposerCest
{
    public function _before()
    {
        View::share('day', Null);
        View::share('dayTitle', Null);
    }

    public function _after()
    {
    }

    public function testHomePageStillWorks(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/');
        $I->see('Day 6', 'a');
        $I->see('View Composer', 'a');
    }

    public function testDay6PageWorks(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day006');
        $I->see('View Composer', 'h1');
        $I->see('Home', 'a');
    }
}
