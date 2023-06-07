<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\TokenResource;
use App\Services\AuthService;
use OpenApi\Annotations as OA;

class RefreshController extends Controller
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
     * Refresh token
     *
     * @OA\Post(
     *     path="/v1/auth/refresh",
     *     summary="Refresh token",
     *     tags={"Auth"},
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     *
     * @return TokenResource
     */
    public function refresh(): TokenResource
    {
        return $this->authService->refresh();
    }
}
