<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\TokenResource;
use App\Services\AuthService;

class RegistrationController extends Controller
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
     * @param RegistrationRequest $request
     * @return TokenResource|string
     */
    public function registration(RegistrationRequest $request): TokenResource|string
    {
        return $this->authService->registration($request);
    }
}
