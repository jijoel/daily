<?php
use \TestGuy;


class Day003_RomanCest
{

    public function _before()
    {
    }

    public function _after()
    {
    }

    public function testSeveralRomanNumerals(TestGuy $I) 
    {
        $I->am('a user');
        $I->amOnPage('/roman2');
        $I->see('Roman Revisited', 'h1');

        $I->fillField('#decimal', '12');
        $I->click('Convert');
        $I->see('Roman value: XII');

        $I->fillField('#decimal', '2013');
        $I->click('Convert');
        $I->see('Roman value: MMXIII');

        $I->fillField('#decimal', '5000');
        $I->click('Convert');
        $I->see('There were errors converting the number');
    }

}