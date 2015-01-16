<?php 
/**
* 
*/
class SpaceshipTest extends TestCase
{
    
    function __construct()
    {
    }

    public function testFirstShip()
    {
        $ship = new stdClass();
        $ship->name = 'Enterprise';

        $mock = Mockery::mock('Spaceship');
        $mock->shouldReceive('first')->once()->andReturn($ship);

        $this->app->instance('Spaceship', $mock);
        $this->call('GET', 'ship');
        $this->assertResponseOK();
    }
    public function tearDown()
    {
        Mockery::close();
    }
}