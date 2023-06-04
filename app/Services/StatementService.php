<?php

namespace App\Services;

use App\Contracts\StatementContract;
use App\Http\Requests\StatementRequest;
use App\Http\Resources\StatementResource;
use App\Models\Statement;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StatementService implements StatementContract
{
    private Statement $statement;

    /**
     * @param Statement $statement
     */
    public function __construct(Statement $statement)
    {
        $this->statement = $statement;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return StatementResource::collection($this->statement::query()->get()->all());
    }

    /**
     * @param StatementRequest $request
     * @return StatementResource
     */
    public function create(StatementRequest $request): StatementResource
    {
        $this->statement->fill($request->all());
        $this->statement->client_id = auth()->user()->getAuthIdentifier();
        $this->statement->save();
        return new StatementResource($this->statement);
    }

    /**
     * @param Statement $statement
     * @return bool|int
     */
    public function update(Statement $statement): bool|int
    {
        return $statement->update();
    }

    /**
     * @param Statement $statement
     * @return StatementResource
     */
    public function view(Statement $statement): StatementResource
    {
        return new StatementResource($this->statement::query()->findOrFail($statement->id));
    }

    /**
     * @param Statement $statement
     * @return bool|null
     */
    public function delete(Statement $statement): ?bool
    {
        return $statement->delete();
    }
}
