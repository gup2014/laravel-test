<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example_empty()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_example_deadwood()
    {
        $response = $this->get('/?q=deadwood');
        $response->assertStatus(200);
    }

    public function test_example_thriller()
    {
        $response = $this->get('/?q=thriller');
        $response->assertStatus(200);

    }

    public function test_example_girls()
    {
        $response = $this->get('/?q=girls');
        $response->assertStatus(200);
    }

    public function test_example_q()
    {
        $response = $this->get('/?q=');
        $response->assertStatus(200);
    }
}
