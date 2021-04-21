<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }

    public function test_can_authenticate_and_receive_token()
    {
    	$response = $this->json('POST', '/api/login_check', [
    		'username' => 'paris.gregoire',
    		'password' => '3secret'
    	]);

    	$response->assertStatus(200)
    			->assertJsonStructure(['token']);
    }
}
