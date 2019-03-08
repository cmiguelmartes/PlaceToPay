<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Cliente\PlaceToPay;

class CrearTransacionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->post('/api/create-transaction')
                    ->assertStatus(200);
    }

    public function testCrearTrasaccion()
    {
        $placeToPay = new PlaceToPay();
        $persona = array(
            "documentType"=>"CC",
            "document"=>"85155379",
            "firstName"=>"Carlos Miguel",
            "lastName"=>"Martes Vega",
            "company"=>"Personal",
            "emailAddress"=>"carlosmiguel782@gmail.com",
            "address"=>"Calle 53D #85E-46",
            "city"=>"Medellin",
            "province"=>"Antioquia",
            "country"=>"Colombia",
            "phone"=>"3043474688",
            "mobile"=>"3043474688",
            "postalCode"=>"000000"
        );
        $this->assertInstanceOf(
            'stdClass',
            $placeToPay->createTransaction("1022",$persona)
        );
    }
}
