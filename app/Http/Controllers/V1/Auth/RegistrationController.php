<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\TokenResource;
use App\Services\AuthService;
use OpenApi\Annotations as OA;

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
     * Registration users
     *
     * @OA\Post(
     *     path="/v1/auth/registration",
     *     summary="Registration user",
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
     *                 @OA\Property(
     *                     property="address",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="phone",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="birthday",
     *                     type="datetime"
     *                 ),
     *                 example={"email": "example@mail.ru", "password": "1235", "address": "Moscow", "phone": "+79999999999", "birthday": "2023-06-03 23:32:17"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     *
     * @param RegistrationRequest $request
     * @return TokenResource|string
     */
    public function registration(RegistrationRequest $request): TokenResource|string
    {
        return $this->authService->registration($request);
    }
}
