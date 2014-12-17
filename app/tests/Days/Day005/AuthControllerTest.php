<?php 

use Days\Day005\AuthController;


class Day5_AuthControllerTest extends ControllerTestCase
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

    public function testAuthControllerReturnsViewOnErrorReturnedFromGoogle()
    {
        Input::replace(array('error'=>'some error'));
        $this->test->postLogin();

        $this->assertPropertyExists($this->layout, 'content');
        $this->assertIsView($this->layout->content);
        $result = $this->layout->render();
        $this->assertContains('some error', $result);
    }

    public function testAuthControllerRequestsCodeFromGoogle()
    {
        Input::replace(array('code'=>Null));
        Config::shouldReceive('get')->once()->andReturn('foo');
        $mock = Mockery::mock('day005_google')
            ->shouldReceive('getAuthorizationUri')->once()
            ->andReturn('bazz')->getMock();
        OAuth::shouldReceive('consumer')->once()->andReturn($mock);

        $response = $this->test->postLogin();
        $this->assertInstanceOf('Illuminate\Http\Response', $response);
        $this->assertEquals('bazz', $response->headers->get('location'));
    }

    public function testAuthControllerRequestsDataFromGoogle()
    {
        Input::replace(array('code'=>'foo'));
        Config::shouldReceive('get')->atLeast()->once()->andReturn('google');
        $mock = Mockery::mock('day005_google')
            ->shouldReceive('requestAccessToken')->once()
            ->shouldReceive('request')->once()
            ->andReturn('{"Foo":"Bar"}')
            ->getMock();
        OAuth::shouldReceive('consumer')->once()->andReturn($mock);

        $response = $this->test->postLogin();
        $this->assertPropertyExists($this->layout, 'content');
        $this->assertIsView($this->layout->content);

        // TODO: Figure out why this is no longer working
        // $result = $this->layout->render();
        // $this->assertContains('Bar', $result);
    }

    public function testAuthControllerCanLogout()
    {
        $response = $this->test->getLogout();
        $this->assertIsRedirect($response, URL::route('day005_login'));
    }

}

