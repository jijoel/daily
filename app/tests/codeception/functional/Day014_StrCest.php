<?php
use \TestGuy;


class Day014_StrCest
{
    public function testViewIndex(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day014');

        // See the page has required elements
        $I->see('Home', 'a');

        // See the page has loaded sample data
        $I->see('one_test_item', 'tr td');
        $I->see('OneTestItem', 'tr td');

        $I->see('one_test_item', 'tr th');
        $I->see('OneTestItem', 'tr th');

        $I->see('<tr><td>camel</td>');
    }

    public function testViewCustom(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day014');

        $I->fillField('#custom', 'test data');
        $I->click('Submit');
        $I->see('test-data', 'tr td');
    }

}