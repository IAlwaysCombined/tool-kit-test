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

/**
 * @OA\Info(
 *
 * )
 */
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
     *
     * @OA\Get(
     *     path="/statement",
     *     summary="Get statements list",
     *     tags={"Statment"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={"name": "Name", "number": "1235", "file": "C://file.txt"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     *
     */
    public function index(): AnonymousResourceCollection
    {
        return $this->statementContract->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *     path="/statement",
     *     summary="Add statement",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="number",
     *                     type="integer"
     *                 ),
     *                 @OA\Property(
     *                     property="file",
     *                     type="string"
     *                 ),
     *                 example={"name": "Name", "number": "1235", "file": "C://file.txt"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     *
     */
    public function store(StatementRequest $request): StatementResource
    {
        return $this->statementContract->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/statement/{id}",
     *     summary="Get statement by id",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={"name": "Name", "number": "1235", "file": "C://file.txt"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function show(Statement $statement): StatementResource
    {
        return $this->statementContract->view($statement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *     path="/statement/{id}",
     *     summary="Update statment by id",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={"name": "Name", "number": "1235", "file": "C://file.txt"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function update(Statement $statement): bool|int
    {
        return $this->statementContract->update($statement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/statement/{id}",
     *     summary="Delete statment by id",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={"name": "Name", "number": "1235", "file": "C://file.txt"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function destroy(Statement $statement): mixed
    {
        return $this->statementContract->delete($statement);
    }
}
