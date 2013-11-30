<?php
use \WebGuy;


class Day007_WebTodoCest
{

    public function _before()
    {
    }

    public function _after()
    {
    }

    public function enterInvalidData(WebGuy $I) 
    {
        $I->am('a user');
        $I->amOnPage('/day007');
        $I->fillField('#item', str_repeat('this is a test. ', 8));
        $I->click('Create');
        $I->see('There were errors');
    }

    public function deleteData(WebGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day007');
        $I->seeLink('Another');
        $I->click('Another');
        $I->wait(200);
        $I->dontSee('Another');
    }
}
