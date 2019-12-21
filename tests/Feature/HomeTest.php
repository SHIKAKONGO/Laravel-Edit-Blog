<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSeeText('welcome to laravel!');
    }
}
