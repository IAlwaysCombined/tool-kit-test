<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;


/**
 * @OA\Info(
 *     version="1.0",
 *     title="Tool kit test"
 * )
 * @OA\Server(
 *     description="Laravel Swagger API server for Tool kit test",
 *     url="http://localhost/api"
 * )
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 * )
 * @OA\PathItem(path="/api")
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
