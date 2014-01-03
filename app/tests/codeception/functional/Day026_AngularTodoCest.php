<?php
use \TestGuy;


class Day026_AngularTodoCest
{

    public function testIndexIsOnCorrectPage(TestGuy $I) 
    {
        $I->amOnPage('/day026');
        $I->see('Day 26', 'h1');
    }

    //TODO: Figure out how to test these for Angular views
    // public function testFailForInvalidData(TestGuy $I)
    // {
    //     $I->amOnPage('/day026');

    //     // Fill the field with bad data; in this case, empty (but required)
    //     $I->fillField('input[ng-model=newItem]', '');
    //     $I->click('input[type=submit]');
    //     $I->see('There were errors', '.error');
    // }

    // public function testSubmitValidData(TestGuy $I) 
    // {
    //     $I->amOnPage('/day026');

    //     $I->fillField('#field', 'goodData');
    //     $I->click('input[type=submit]');
    //     $I->see('goodData');    // success indicator
    // }


}

