<?php
use \TestGuy;


class Day007_TodoCest
{
    public function testViewIndex(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day007');

        // See the page has required elements
        $I->see('Todo List', 'h1');
        $I->see('Home', 'a');
        $I->see('New Item', 'p');

        // See the page has loaded sample data
        $I->see('Test Todo', 'li');
    }

    public function testInsertItem(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day007');
        $I->fillField('#item', 'New Item');
        $I->click('Create');
        $I->seeInDatabase('day007_todos', array('item'=>'New Item'));
        $I->see('New Item', 'li');
    }

    public function enterInvalidData(TestGuy $I) 
    {
        $I->am('a user');
        $I->amOnPage('/day007');
        $I->fillField('#item', str_repeat('this is a test. ', 8));
        $I->click('Create');
        $I->see('There were errors');
    }


    public function testDeleteItem(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day007');
        $I->seeInDatabase('day007_todos', array('item'=>'Test Todo'));
        $I->click('Test Todo');
        // We can't actually delete an object, but this should do that:
        $I->sendAjaxPostRequest('/day007/1', array('_method'=>'DELETE'));
        $I->dontSeeInDatabase('day007_todos', array('item'=>'Test Todo'));
    }

}