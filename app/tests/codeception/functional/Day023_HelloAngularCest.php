<?php
use \TestGuy;


class Day023_HelloAngularCest
{

    public function testIndexIsOnCorrectPage(TestGuy $I) 
    {
        $I->amOnPage('/day023');
        $I->see('Hello, Angular', 'h1');
    }
    
}

