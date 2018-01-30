<?php

namespace Tests\Functional;

class ApiTest extends BaseTestCase
{
    public function testHomePage()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Welcome', (string) $response->getBody());
        $this->assertNotContains('error', (string) $response->getBody());
        $this->assertNotContains('connect', (string) $response->getBody());
    }

    public function testGetVersion()
    {
        $response = $this->runApp('GET', '/version');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('version', (string) $response->getBody());
        $this->assertNotContains('error', (string) $response->getBody());
    }

    public function testGetUser()
    {
        $response = $this->runApp('GET', '/users/6');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('id', (string) $response->getBody());
        $this->assertContains('first_name', (string) $response->getBody());
        $this->assertContains('Dustin', (string) $response->getBody());
        $this->assertNotContains('error', (string) $response->getBody());
    }

    public function testGetUserNotFound()
    {
        $response = $this->runApp('GET', '/users/12345678901234567890');

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertNotContains('first_name', (string) $response->getBody());
        $this->assertNotContains('last_name', (string) $response->getBody());
        $this->assertContains('error', (string) $response->getBody());
        $this->assertContains('OAuthException', (string) $response->getBody());
    }

    public function testGetUserGraphMethodException()
    {
        $response = $this->runApp('GET', '/users/123456');

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertNotContains('first_name', (string) $response->getBody());
        $this->assertNotContains('last_name', (string) $response->getBody());
        $this->assertContains('error', (string) $response->getBody());
        $this->assertContains('GraphMethodException', (string) $response->getBody());
    }

    public function testGetPage()
    {
        $response = $this->runApp('GET', '/pages/github');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('id', (string) $response->getBody());
        $this->assertContains('name', (string) $response->getBody());
        $this->assertContains('about', (string) $response->getBody());
        $this->assertContains('link', (string) $response->getBody());
        $this->assertNotContains('error', (string) $response->getBody());
    }

    public function testGetPageNotFound()
    {
        $response = $this->runApp('GET', '/pages/github123456');

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertNotContains('name', (string) $response->getBody());
        $this->assertNotContains('about', (string) $response->getBody());
        $this->assertNotContains('link', (string) $response->getBody());
        $this->assertContains('error', (string) $response->getBody());
        $this->assertContains('OAuthException', (string) $response->getBody());
    }

    public function testPostHomepageNotAllowed()
    {
        $response = $this->runApp('POST', '/', ['test']);

        $this->assertEquals(405, $response->getStatusCode());
        $this->assertContains('Method not allowed', (string) $response->getBody());
    }
}
