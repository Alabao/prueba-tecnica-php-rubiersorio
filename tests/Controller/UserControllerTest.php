<?php

namespace Controller;

use GuzzleHttp\Exception\ServerException;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    private $http;

    public function setUp(): void

    {
        $this->http = new \GuzzleHttp\Client(['base_uri' => 'http://localhost:80']);
    }

    public function tearDown(): void
    {
        $this->http = null;
    }
    public function testGetUser()
    {
        $this->expectException(ServerException::class);
        $this->http->request('GET', 'src?id=1');
    }

    public function testAddUser()
    {
        $response = $this->http->request('POST', 'src', ['form_params' => [
            'id' => '1',
            'email' => 'test@gmail.com',
            'name' => 'Test user',
            'password' => 'testpassword',
        ]]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
