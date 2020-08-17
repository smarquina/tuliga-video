<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 17/08/2020
 * Time: 8:59
 */

namespace App\Http\Controllers\Api\Film;


use App\Http\Controllers\Api\ApiController;
use App\Http\Models\Film\Film;
use App\Http\Resources\Film\FilmCollection;
use App\Http\Services\Film\FilmService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class FilmController
 * @package App\Http\Controllers\Api\Film
 */
class FilmController extends ApiController {

    /**
     * All films.
     *
     * @return JsonResponse
     *
     * @OA\Get(
     *   path="/api/films/all",
     *   summary="list of films",
     *   tags={"film"},
     *   operationId="listFilms",
     *  @OA\Parameter(
     *     name="type",
     *     in="query",
     *     required=false,
     *     description="Filter films by type",
     *     @OA\Schema(type="integer")
     *  ),
     *  @OA\Parameter(
     *     name="pageSize",
     *     in="query",
     *     required=false,
     *     description="Pagination size per page",
     *     @OA\Schema(type="integer")
     *  ),
     *  @OA\Parameter(
     *     name="page",
     *     in="query",
     *     required=false,
     *     description="Pagination page",
     *     @OA\Schema(type="integer")
     *  ),
     *  @OA\Response(
     *     response=200,
     *     description="A list of films",
     *     @OA\JsonContent(type="array",
     *       @OA\Items(ref="#/components/schemas/Film")
     *   ),
     *   )
     * )
     */
    public function listFilms(Request $request) {

        /** @var Film $films */
        $films = FilmService::filterFilms($request->get('type'), $request->get('genre'));

        return response()->json($this->paginate(new FilmCollection($films)));
    }
}
