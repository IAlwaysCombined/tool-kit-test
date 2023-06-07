<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

class LogoutController extends Controller
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
     * Logout
     *
     * @OA\Post(
     *     path="/v1/auth/logout",
     *     summary="Logout",
     *     tags={"Auth"},
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        return $this->authService->logout();
    }
}
