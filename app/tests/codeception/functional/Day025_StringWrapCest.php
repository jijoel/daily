<?php
use \TestGuy;


class Day025_StringWrapCest
{

    public function testIndexIsOnCorrectPage(TestGuy $I) 
    {
        $I->amOnPage('/day025');
        $I->see('String Wrap Kata', 'h1');
    }

    public function testFailForInvalidData(TestGuy $I)
    {
        $I->amOnPage('/day025');

        $I->fillField('#length', '12345678901234567890');
        $I->click('input[type=submit]');
        $I->see('There were errors', '.error');
    }

    public function testSubmitValidDataFor8(TestGuy $I) 
    {
        $I->amOnPage('/day025');

        $I->fillField('#length', '8');
        $I->fillField('#text', 'This is a test of the system');
        $I->click('input[type=submit]');
        $I->see('This is<br>a test<br>of the<br>system');
    }

    public function testSubmitValidDataFor12(TestGuy $I) 
    {
        $I->amOnPage('/day025');

        $I->fillField('#length', '12');
        $I->fillField('#text', 'This is a test of the system');
        $I->click('input[type=submit]');
        $I->see('This is a<br>test of the<br>system');
    }

}
