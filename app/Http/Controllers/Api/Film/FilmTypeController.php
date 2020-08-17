<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 17/08/2020
 * Time: 10:02
 */

namespace App\Http\Controllers\Api\Film;


use App\Http\Controllers\Api\ApiController;
use App\Http\Models\Film\FilmType;
use App\Http\Resources\Film\FilmTypeResource;
use Illuminate\Http\JsonResponse;

class FilmTypeController extends ApiController {

    /**
     * All Film types.
     *
     * @return JsonResponse
     *
     * @OA\Get(
     *   path="/api/films/type/all",
     *   summary="list of film types",
     *   tags={"film"},
     *   operationId="listAll",
     *  @OA\Response(
     *     response=200,
     *     description="A list of film types",
     *     @OA\JsonContent(type="array",
     *       @OA\Items(ref="#/components/schemas/FilmType")
     *   ),
     *   )
     * )
     */
    public function listAll() {

        return FilmTypeResource::collection(FilmType::all());
    }
}
