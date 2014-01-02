<?php
use \TestGuy;


/**
 * @group now
 */
class Day026_AngularTodoCest
{

    public function testIndexIsOnCorrectPage(TestGuy $I) 
    {
        $I->amOnPage('/day026');
        $I->see('Day 26', 'h1');
    }

    public function testFailForInvalidData(TestGuy $I)
    {
        $I->amOnPage('/day026');

        // Fill the field with bad data; in this case, empty (but required)
        $I->fillField('#field', '');
        $I->click('input[type=submit]');
        $I->see('There were errors', '.error');
    }

    public function testSubmitValidData(TestGuy $I) 
    {
        $I->amOnPage('/day026');

        $I->fillField('#field', 'goodData');
        $I->click('input[type=submit]');
        $I->see('goodData');    // success indicator
    }


}

