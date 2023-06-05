<?php

namespace App\Contracts;

use App\Http\Requests\StatementRequest;
use App\Http\Resources\StatementResource;
use App\Models\Statement;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface StatementContract
{
    public function index(): AnonymousResourceCollection;

    public function view(Statement $statement): StatementResource;

    public function create(StatementRequest $request): StatementResource;

    public function update(Statement $statement, StatementRequest $request): bool|int;

    public function delete(Statement $statement): mixed;
}
