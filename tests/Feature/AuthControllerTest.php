<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testRegistration(): void
    {
        $user = [
            "email" => "example1@mail.ru",
            "password" => "123",
            "address" => "Address",
            "phone" => "89652345667",
            "birthday" => "2023-06-03 23:32:17"
        ];

        $response = $this->post('api/v1/auth/registration', $user);

        $response->assertStatus(200);
    }

    public function testRegistrationWithBadEmail(): void
    {
        $user = [
            "email" => "badEmail",
            "password" => "123",
            "address" => "Address",
            "phone" => "89652345667",
            "birthday" => "2023-06-03 23:32:17"
        ];

        $response = $this->post('api/v1/auth/registration', $user);

        $response->assertStatus(302);
    }

//    public function testLogin(): void
//    {
//        $user = [
//            "email" => "verner99@example.org",
//            "password" => "123",
//        ];
//
//        $response = $this->post('api/v1/auth/login', $user);
//
//        $response->assertStatus(200);
//    }

    public function testLoginWithBadEmail(): void
    {
        $user = [
            "email" => "badEmail",
            "password" => "123",
        ];

        $response = $this->post('api/v1/auth/login', $user);

        $response->assertStatus(302);
    }
}
