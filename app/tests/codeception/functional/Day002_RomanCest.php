<?php
use \TestGuy;

class Day002_RomanCest
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
        $I->amOnPage('/roman');
        $I->see('Roman Numerals', 'h1');
        $I->fillField('#decimal', '12');
        $I->click('Convert');
        $I->see('Roman value: XII');
        $I->fillField('#decimal', '1');
        $I->click('Convert');
        $I->see('Roman value: I');
        $I->fillField('#decimal', '124');
        $I->click('Convert');
        $I->see('Roman value: CXXIV');
        $I->fillField('#decimal', '1979');
        $I->click('Convert');
        $I->see('Roman value: MCMLXXIX');
        $I->fillField('#decimal', '2013');
        $I->click('Convert');
        $I->see('Roman value: MMXIII');
    }

}