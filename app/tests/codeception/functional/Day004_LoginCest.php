<?php
use \TestGuy;


class Day004_LoginCest
{

    public function _before()
    {
    }

    public function _after()
    {
    }

    public function testFailToLoadDashboardBeforeLoggingIn(TestGuy $I)
    {
        Route::enableFilters();
        $I->am('a user');
        $I->amOnPage('day004_dashboard');
        $I->seeInCurrentUrl('day004_login');
    }

    public function testLogInFails(TestGuy $I) 
    {
        $I->am('a user');
        $I->amOnPage('/day004_login');
        $I->see('Login', 'h1');
        $I->fillField('#username', 'foo');
        $I->fillField('#password', 'wrong password');
        $I->click('Login');
        $I->see('There were errors');
    }

    public function testLogIn(TestGuy $I) 
    {
        $I->am('a user');
        $I->amOnPage('/day004_login');
        $I->fillField('#username', 'foo');
        $I->fillField('#password', 'test');
        $I->click('Login');
        $I->seeInCurrentUrl('day004_dashboard');
    }

    public function testLogout(TestGuy $I)
    {
        $I->am('a user');
        $I->amOnPage('/day004_logout');
        $I->dontSeeInCurrentUrl('/day004_logout');
        $I->seeInCurrentUrl('/day004_login');
        $I->see('Login', 'h1');
    }

}

