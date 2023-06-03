<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\TokenResource;
use App\Services\AuthService;

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
     * @return TokenResource
     */
    public function refresh(): TokenResource
    {
        return $this->authService->refresh();
    }
}
