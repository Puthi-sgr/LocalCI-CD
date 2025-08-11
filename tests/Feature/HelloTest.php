<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertOk()
                    ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
                    ->assertJson([ 
                        'message' => 'hello'
                    ])
                    ->assertStatus(200);
    }
}
