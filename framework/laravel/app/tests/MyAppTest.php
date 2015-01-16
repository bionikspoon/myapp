<?php 
class MyAppTest extends TestCase
{
    
    function __construct()
    {
    }
    public function testMyAppRoute()
    {
        $response = $this->call('GET', 'myapp');
        $this->assertResponseOK();
        $this->assertEquals('This is my app', $response->getContent());
    }
}