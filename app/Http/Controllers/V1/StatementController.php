<?php

namespace App\Http\Controllers\V1;

use App\Contracts\StatementContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatementRequest;
use App\Http\Resources\StatementResource;
use App\Models\Statement;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use OpenApi\Annotations as OA;

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
     *     path="/v1/statement",
     *     summary="Get statements list",
     *     tags={"Statment"},
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     security={{"bearerAuth":{}}}
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
     *     path="/v1/statement",
     *     summary="Add statement",
     *     tags={"Statment"},
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
     *     ),
     *     security={{"bearerAuth":{}}}
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
     *     path="/v1/statement/{id}",
     *     summary="Get statement by id",
     *     tags={"Statment"},
     *     @OA\Parameter(
     *          name="id",
     *          example=15,
     *          in="path",
     *              @OA\Schema(
     *                  type="integer"
     *          )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     security={{"bearerAuth":{}}}
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
     *     path="/v1/statement/{id}",
     *     summary="Update statment by id",
     *     tags={"Statment"},
     *     @OA\Parameter(
     *          name="id",
     *          example=15,
     *          in="path",
     *              @OA\Schema(
     *                  type="integer"
     *          )
     *     ),
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
     *     ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function update(Statement $statement, StatementRequest $request): bool|int
    {
        return $this->statementContract->update($statement, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/v1/statement/{id}",
     *     summary="Delete statment by id",
     *     tags={"Statment"},
     *     @OA\Parameter(
     *          name="id",
     *          example=15,
     *          in="path",
     *              @OA\Schema(
     *                  type="integer"
     *          )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     ),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function destroy(Statement $statement): mixed
    {
        return $this->statementContract->delete($statement);
    }
}
