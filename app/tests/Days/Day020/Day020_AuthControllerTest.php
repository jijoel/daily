<?php


class Day020_AuthControllerTest extends ControllerTestCase
{
    private $auth;

    public function setUp()
    {
        parent::setUp();

        $this->auth = Mockery::mock('Day20_Auth')
            ->shouldReceive('guest')->andReturn(True)
            ->shouldReceive('user')
            ->getMock();
 
        App::instance('auth', $this->auth);
    }

    public function testLogout()
    {
        $this->auth->shouldReceive('logout')->once();

        $this->call('GET', '/day020/logout');

        $this->assertRedirectedToRoute('day020');
    }

    public function testLoginFails()
    {
        $this->auth->shouldReceive('attempt')->once();

        $this->call('POST', '/day020/login');

        $this->assertResponseStatus(403);
        $this->assertSee('Invalid username or password');
    }

    public function testLoginSucceeds()
    {
        $this->auth->shouldReceive('attempt')->once()->andReturn(True);
        $credentials = ['username'=>'foo', 'password'=>'test'];

        $this->call('POST', '/day020/login', $credentials);

        $this->assertRedirectedToRoute('day020');
    }

}

