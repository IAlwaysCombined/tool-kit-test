<?php

namespace App\Http\Controllers\V1;

use App\Contracts\StatementContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatementRequest;
use App\Http\Resources\StatementResource;
use App\Models\Statement;
use App\Services\StatementService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StatementController extends Controller
{
    private StatementContract $statementContract;

    public function __construct(StatementContract $statementContract)
    {
        $this->statementContract = $statementContract;
        $this->authorizeResource(Statement::class, 'statement');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return $this->statementContract->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatementRequest $request): StatementResource
    {
        return $this->statementContract->create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Statement $statement): StatementResource
    {
        return $this->statementContract->view($statement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Statement $statement): bool|int
    {
        return $this->statementContract->update($statement);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statement $statement): mixed
    {
        return $this->statementContract->delete($statement);
    }
}
