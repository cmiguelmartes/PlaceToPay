<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LandingPSETest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/responsePSE')
                    ->assertStatus(200)
                    ->assertSee('Pago realizado con exito');
    }
}
