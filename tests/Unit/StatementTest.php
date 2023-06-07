<?php

namespace Tests\Unit;

use App\Contracts\StatementContract;
use App\Http\Controllers\V1\StatementController;
use App\Http\Requests\StatementRequest;
use App\Http\Resources\StatementResource;
use App\Models\Statement;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class StatementTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testIndexMethod(): void
    {
        // Создаем фейковый объект StatementContract
        $statementContract = $this->createMock(StatementContract::class);

        // Задаем ожидание вызова метода index() и возвращаемое значение
        $expectedResult = $this->createMock(AnonymousResourceCollection::class);
        $statementContract->expects($this->once())
            ->method('index')
            ->willReturn($expectedResult);

        // Создаем объект класса, который содержит тестируемый метод
        $testObject = new StatementController($statementContract);

        // Вызываем тестируемый метод
        $result = $testObject->index();

        // Проверяем, что результат соответствует ожидаемому типу
        $this->assertInstanceOf(
            AnonymousResourceCollection::class,
            $result,
            'The index method should return an instance of AnonymousResourceCollection.'
        );
    }

    /**
     * @throws Exception
     */
    public function testShowMethod(): void
    {
        // Создаем фейковый объект StatementContract
        $statementContract = $this->createMock(StatementContract::class);

        // Создаем фейковый объект Statement
        $statement = $this->createMock(Statement::class);

        // Задаем ожидание вызова метода view() и возвращаемое значение
        $expectedResult = $this->createMock(StatementResource::class);
        $statementContract->expects($this->once())
            ->method('view')
            ->with($statement)
            ->willReturn($expectedResult);

        // Создаем объект класса, который содержит тестируемый метод
        $testObject = new StatementController($statementContract);

        // Вызываем тестируемый метод
        $result = $testObject->show($statement);

        // Проверяем, что результат соответствует ожидаемому типу
        $this->assertInstanceOf(
            StatementResource::class,
            $result,
            'The show method should return an instance of StatementResource.'
        );
    }

    /**
     * @throws Exception
     */
    public function testStoreMethod(): void
    {
        // Создаем фейковый объект StatementContract
        $statementContract = $this->createMock(StatementContract::class);

        // Создаем фейковый объект StatementRequest
        $request = $this->createMock(StatementRequest::class);

        // Задаем ожидание вызова метода create() и возвращаемое значение
        $expectedResult = $this->createMock(StatementResource::class);
        $statementContract->expects($this->once())
            ->method('create')
            ->with($request)
            ->willReturn($expectedResult);

        // Создаем объект класса, который содержит тестируемый метод
        $testObject = new StatementController($statementContract);

        // Вызываем тестируемый метод
        $result = $testObject->store($request);

        // Проверяем, что результат соответствует ожидаемому типу
        $this->assertInstanceOf(
            StatementResource::class,
            $result,
            'The store method should return an instance of StatementResource.'
        );
    }

    /**
     * @throws Exception
     */
    public function testUpdateMethod(): void
    {
        // Создаем фейковый объект StatementContract
        $statementContract = $this->createMock(StatementContract::class);

        // Создаем фейковый объект Statement
        $statement = $this->createMock(Statement::class);

        // Создаем фейковый объект StatementRequest
        $request = $this->createMock(StatementRequest::class);

        $statementContract->expects($this->once())
            ->method('update')
            ->with($statement, $request)
            ->willReturn(1);

        // Создаем объект класса, который содержит тестируемый метод
        $testObject = new StatementController($statementContract);

        // Вызываем тестируемый метод
        $result = $testObject->update($statement, $request);

        // Проверяем, что результат соответствует ожидаемому типу
        $this->assertIsInt($result);
    }

    /**
     * @throws Exception
     */
    public function testDestroyMethod(): void
    {
        // Создаем фейковый объект StatementContract
        $statementContract = $this->createMock(StatementContract::class);

        // Создаем фейковый объект Statement
        $statement = $this->createMock(Statement::class);

        $statementContract->expects($this->once())
            ->method('delete')
            ->with($statement)
            ->willReturn(true);

        // Создаем объект класса, который содержит тестируемый метод
        $testObject = new StatementController($statementContract);

        // Вызываем тестируемый метод
        $result = $testObject->destroy($statement);

        // Проверяем, что результат соответствует ожидаемому типу
        $this->assertIsBool($result);
    }
}
