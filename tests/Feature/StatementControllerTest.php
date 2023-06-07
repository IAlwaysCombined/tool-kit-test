<?php

namespace Tests\Feature;

use App\Http\Middleware\Authenticate;
use Tests\TestCase;

class StatementControllerTest extends TestCase
{
    public function testIndexWithForbidden(): void
    {
        $this->withoutMiddleware(Authenticate::class);

        $response = $this->get('/api/v1/statement');
        $response->assertStatus(403);
    }

//    public function testIndex(): void
//    {
//        $response = $this->get('/api/v1/statement');
//        $response->assertStatus(200);
//    }
}
