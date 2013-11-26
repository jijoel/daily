<?php 

use Days\Day004\AuthController;


/**
 * @group now
 */
class AuthControllerTest extends ControllerTestCase
{
    private $test;    
    private $layout;  

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');

        $this->test = new AuthController;
        $this->setupLayout($this->test);
        $this->layout = $this->getLayout($this->test);
    }

    public function testAuthControllerCanShowLoginPage()
    {
        $this->test->getLogin();

        $this->assertPropertyExists($this->layout, 'content');
        $this->assertIsView($this->layout->content);
    }

    // public function testAuthControllerCanPostLogin()
    // {
    //     Auth::shouldReceive('attempt')->once()->andReturn(True);

    //     $response = $this->test->postLogin();
    //     $this->assertIsRedirect($response, URL::route('day004_login'));
    // }

    public function testAuthControllerCanReturnErrors()
    {
        Auth::shouldReceive('attempt')->once()->andReturn(False);

        $response = $this->test->postLogin();
        $this->assertIsRedirect($response, URL::route('day004_login'));
    }

    public function testAuthControllerCanLogout()
    {
        $response = $this->test->getLogout();
        $this->assertIsRedirect($response, URL::route('day004_login'));
    }

}

