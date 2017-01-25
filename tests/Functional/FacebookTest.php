<?php

namespace Tests\Functional;

require __DIR__.'/../../src/facebook.php';

class FacebookTest extends BaseTestCase
{
    /**
     * Test that the index route returns a response containing the text 'Welcome' but not a error.
     */
    public function testHomePage()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Welcome', (string) $response->getBody());
        $this->assertNotContains('error', (string) $response->getBody());
        $this->assertNotContains('connect', (string) $response->getBody());
    }

    /**
     * Test that the index route with optional name argument returns a facebook profile info.
     */
    public function testGetUser()
    {
        $response = $this->runApp('GET', '/users/6');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('id', (string) $response->getBody());
        $this->assertContains('first_name', (string) $response->getBody());
        $this->assertContains('Dustin', (string) $response->getBody());
        $this->assertNotContains('error', (string) $response->getBody());
    }

    /**
     * Test that endpoint users return completed and valid data.
     */
    public function testGetUserFullInfo()
    {
        $response = $this->runApp('GET', '/users/fullinfo/1000');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('id', (string) $response->getBody());
        $this->assertContains('first_name', (string) $response->getBody());
        $this->assertContains('link', (string) $response->getBody());
        $this->assertContains('source', (string) $response->getBody());
        $this->assertNotContains('error', (string) $response->getBody());
    }

    /**
     * Test that endpoint pages return valid data about a Facebook Fan Page.
     */
    public function testGetPageFullInfo()
    {
        $response = $this->runApp('GET', '/pages/github');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('id', (string) $response->getBody());
        $this->assertContains('name', (string) $response->getBody());
        $this->assertContains('about', (string) $response->getBody());
        $this->assertContains('link', (string) $response->getBody());
        $this->assertNotContains('error', (string) $response->getBody());
    }

    /**
     * Test that the index route won't accept a post request.
     */
    public function testPostHomepageNotAllowed()
    {
        $response = $this->runApp('POST', '/', ['test']);

        $this->assertEquals(405, $response->getStatusCode());
        $this->assertContains('Method not allowed', (string) $response->getBody());
    }
}
