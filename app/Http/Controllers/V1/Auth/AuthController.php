<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\TokenResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

class AuthController extends Controller
{
    private AuthService $authService;

    /**
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Auth users
     *
     * @OA\Post(
     *     path="/v1/auth/login",
     *     summary="Auth user",
     *     tags={"Auth"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),
     *                 example={"email": "example@mail.ru", "password": "1235"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     *
     * @param AuthRequest $request
     * @return JsonResponse|TokenResource
     */
    public function auth(AuthRequest $request): JsonResponse|TokenResource
    {
        return $this->authService->auth($request);
    }


}
