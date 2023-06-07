<?php

namespace Tests\Unit;

use App\Http\Controllers\V1\Auth\AuthController;
use App\Http\Controllers\V1\Auth\LogoutController;
use App\Http\Controllers\V1\Auth\RefreshController;
use App\Http\Controllers\V1\Auth\RegistrationController;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\TokenResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAuthMethod(): void
    {
        // Создаем фейковый объект AuthRequest
        $request = $this->createMock(AuthRequest::class);

        // Создаем фейковый объект AuthService
        $authService = $this->createMock(AuthService::class);

        $expectedResult = $this->createMock(JsonResponse::class);
        $expectedResult2 = $this->createMock(TokenResource::class);
        $authService->expects($this->once())
            ->method('auth')
            ->with($request)
            ->willReturnOnConsecutiveCalls($expectedResult, $expectedResult2);

        // Создаем объект класса, который содержит тестируемый метод
        $testObject = new AuthController($authService);

        // Вызываем тестируемый метод
        $result = $testObject->auth($request);

        // Проверяем, что результат соответствует ожидаемому типу
        $this->assertTrue(
            $result instanceof JsonResponse || $result instanceof TokenResource,
            'The auth method should return an instance of JsonResponse or TokenResource.'
        );
    }

    /**
     * @throws Exception
     */
    public function testRegistrationMethod(): void
    {
        // Создаем фейковый объект RegistrationRequest
        $request = $this->createMock(RegistrationRequest::class);

        // Создаем фейковый объект AuthService
        $authService = $this->createMock(AuthService::class);

        // Задаем ожидание вызова метода registration() и возвращаемое значение
        $expectedResult = $this->createMock(TokenResource::class);
        $expectedResult2 = 'success';
        $authService->expects($this->once())
            ->method('registration')
            ->with($request)
            ->willReturnOnConsecutiveCalls($expectedResult, $expectedResult2);

        // Создаем объект класса, который содержит тестируемый метод
        $testObject = new RegistrationController($authService);

        // Вызываем тестируемый метод
        $result = $testObject->registration($request);

        // Проверяем, что результат соответствует ожидаемому типу
        $this->assertTrue(
            $result instanceof TokenResource || is_string($result),
            'The registration method should return an instance of TokenResource or a string.'
        );
    }

    /**
     * @throws Exception
     */
    public function testLogoutMethod(): void
    {
        // Создаем фейковый объект AuthService
        $authService = $this->createMock(AuthService::class);

        // Задаем ожидание вызова метода logout() и возвращаемое значение
        $expectedResult = $this->createMock(JsonResponse::class);
        $authService->expects($this->once())
            ->method('logout')
            ->willReturn($expectedResult);

        // Создаем объект класса, который содержит тестируемый метод
        $testObject = new LogoutController($authService);

        // Вызываем тестируемый метод
        $result = $testObject->logout();

        // Проверяем, что результат соответствует ожидаемому типу
        $this->assertInstanceOf(
            JsonResponse::class,
            $result,
            'The logout method should return an instance of JsonResponse.'
        );
    }

    /**
     * @throws Exception
     */
    public function testRefreshMethod(): void
    {
        // Создаем фейковый объект AuthService
        $authService = $this->createMock(AuthService::class);

        // Задаем ожидание вызова метода refresh() и возвращаемое значение
        $expectedResult = $this->createMock(TokenResource::class);
        $authService->expects($this->once())
            ->method('refresh')
            ->willReturn($expectedResult);

        // Создаем объект класса, который содержит тестируемый метод
        $testObject = new RefreshController($authService);

        // Вызываем тестируемый метод
        $result = $testObject->refresh();

        // Проверяем, что результат соответствует ожидаемому типу
        $this->assertInstanceOf(
            TokenResource::class,
            $result,
            'The refresh method should return an instance of TokenResource.'
        );
    }
}
