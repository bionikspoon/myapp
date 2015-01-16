<?php 
class MyAppTest extends TestCase
{
    

    public function testMyAppRoute()
    {
        $response = $this->call('GET', 'myapp');
        $this->assertResponseOK();
        $this->assertEquals('This is my app', $response->getContent());
    }
}