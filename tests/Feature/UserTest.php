<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginAccess()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testAdmin()
    {
        $response = $this->get('/admin/panel');

        $response->assertStatus(302);
    }


    public function testauthenticated_to_a_user()
    {


        $credentials = [
            "email" => "jamesmoralesmoreno@gmail.com",
            "password" => "12345678"
        ];

        $response = $this->post('/login', $credentials);
        
        $response->assertRedirect('/home');
        
    }
}
