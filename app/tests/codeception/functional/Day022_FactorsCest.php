<?php
use \TestGuy;


class Day022_FactorsCest
{

    public function testIndexIsOnCorrectPage(TestGuy $I) 
    {
        $I->amOnPage('/day022');
        $I->see('Prime Factors', 'h1');
    }

    public function testSubmitValidData(TestGuy $I) 
    {
        $I->amOnPage('/day022');

        $I->fillField('#number', '12');
        $I->click('input[type=submit]');
        $I->see('2', 'h1');

        $I->fillField('#number', 269*22943);
        $I->click('input[type=submit]');
        $I->see('269', 'h1');
        $I->see('22943', 'h1');
    }

    public function testFailForInvalidData(TestGuy $I)
    {
        $I->amOnPage('/day022');

        $I->fillField('#number', '12345678901234567890');
        $I->click('input[type=submit]');
        $I->see('There were errors', '.error');
    }

}

