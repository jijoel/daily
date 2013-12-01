<?php
use \TestGuy;


class Day008_TodoCest
{
    public function testViewIndex(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day008');

        // See the page has required elements
        $I->see('RESTful Todos', 'h1');
        $I->see('Home', 'a');
        $I->seeLink('Add new todo');

        // See the page has loaded sample data
        $I->see('Test Todo', 'td');
    }

    public function testInsertItem(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day008');
        $I->dontSeeInDatabase('day007_todos', array('item'=>'New Item'));
        $I->click('Add new todo');
        $I->fillField('#item', 'New Item');
        $I->click('Submit');
        $I->seeInDatabase('day007_todos', array('item'=>'New Item'));
        $I->see('New Item', 'td');
    }

    public function testDeleteItem(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day008');
        $I->seeInDatabase('day007_todos', array('item'=>'Test Todo'));
        $I->click('Delete');  // the first delete button on the page
        $I->dontSeeInDatabase('day007_todos', array('item'=>'Test Todo'));
    }

    public function testEditItem(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day008');
        $I->click('Edit');           // the first edit button on the page

        $I->seeInCurrentUrl('day008/1/edit');
        $I->seeInDatabase('day007_todos', array('item'=>'Test Todo'));
        $I->dontSeeInDatabase('day007_todos', array('item'=>'Revised Todo'));

        $I->submitForm('form', array('item'=>'Revised Todo'));

        $I->dontSeeInDatabase('day007_todos', array('item'=>'Test Todo'));
        $I->seeInDatabase('day007_todos', array('item'=>'Revised Todo'));
    }

}