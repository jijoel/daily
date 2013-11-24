<?php
use \WebGuy;

class WebRomanCest
{

    public function _before()
    {
    }

    public function _after()
    {
    }

    // tests
    public function tryToTest(WebGuy $I) 
    {
        $I->am('a user');
        $I->amOnPage('/roman');
        $I->see('Roman Numerals');
        $I->fillField('Decimal value', '12');
        $I->click('Convert');
        $I->see('Roman value: XII');
    }

}