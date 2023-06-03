<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\TokenResource;
use App\Models\Client;
use App\Models\User;
use App\Models\UserRole;
use Closure;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AuthService
{
    private User $user;
    private Client $client;
    private UserRole $userRole;

    const USER_ROLE = 1;

    public function __construct(User $user, Client $client, UserRole $userRole)
    {
        $this->user = $user;
        $this->client = $client;
        $this->userRole = $userRole;
    }

    /**
     * @param AuthRequest $request
     * @return JsonResponse|TokenResource
     */
    public function auth(AuthRequest $request): JsonResponse|TokenResource
    {
        if (!$token = auth()->attempt($request->all())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return new TokenResource($token);
    }

    /**
     * @param RegistrationRequest $request
     * @return TokenResource|string
     */
    public function registration(RegistrationRequest $request): TokenResource|string
    {

        DB::beginTransaction();
        try {
            $this->user->fill($request->all());
            $this->user->save();

            $this->client->fill($request->all());
            $this->client->save();

            $this->userRole->role_id = self::USER_ROLE;
            $this->userRole->user_id = $this->user->id;
            $this->userRole->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $token = auth()->attempt($credentials);
        return new TokenResource($token);
    }

    /**
     * @return TokenResource
     */
    public function refresh(): TokenResource
    {
        return new TokenResource(auth()->refresh('', '', ''));
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
