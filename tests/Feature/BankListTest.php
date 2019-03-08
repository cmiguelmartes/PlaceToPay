<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BankListTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api/bank-list')
                    ->assertStatus(200)
                    ->assertSee('BANCO UNION COLOMBIANO');
    }
}
