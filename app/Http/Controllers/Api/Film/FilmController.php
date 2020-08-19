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
use App\Http\Repositories\Film\FilmRepository;
use App\Http\Requests\Film\FilmBookingRequest;
use App\Http\Resources\Film\FilmCollection;
use App\Http\Resources\Film\FilmResource;
use App\Http\Services\Film\FilmService;
use Carbon\Carbon;
use Dingo\Api\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class FilmController
 * @package App\Http\Controllers\Api\Film
 */
class FilmController extends ApiController {

    /** @var FilmRepository */
    private $repository;

    /**
     * FilmController constructor.
     * @param FilmRepository $repository
     */
    public function __construct(FilmRepository $repository) {
        $this->repository = $repository;
        parent::__construct();
    }

    /**
     * All films.
     *
     * @param Request $request
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
    public function listFilms(Request $request): JsonResponse {

        /** @var Film $films */
        $films = $this->repository->findByTypeOrGenre($request->get('type'), $request->get('genre'));

        return response()->json($this->paginate(new FilmCollection($films)));
    }

    /**
     * @param FilmBookingRequest $request
     * @param FilmService        $service
     * @return JsonResponse|Response
     *
     * @OA\Post(
     *   path="/api/films/book/price",
     *   summary="Request films price",
     *   tags={"film"},
     *   operationId="calculatePrice",
     *   @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="date_begin",
     *                     type="string",
     *                     description="Required. US date format"
     *                 ),
     *                 @OA\Property (
     *                     property="films",
     *                     type="array",
     *                     description="Required",
     *                      @OA\Items(
     *                        @OA\Property(property="film_id", type="integer", description="Required"),
     *                        @OA\Property(property="date_end", type="string", description="Required. US date format"),
     *                      ),
     *                 ),
     *              ),
     *         )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Ok response",
     *    @OA\JsonContent(type="object",
     *      @OA\Property (property="data", type="object",
     *        @OA\Property(property="films", type="array",
     *          @OA\Items(
     *            @OA\Property(property="film", ref="#/components/schemas/Film"),
     *            @OA\Property(property="period", type="integer"),
     *            @OA\Property(property="price", type="integer"),
     *          ),
     *        ),
     *        @OA\Property(property="total_price", type="integer"),
     *      ),
     *    ),
     *  ),
     * @OA\Response(response="400", description="Error ocurred"),
     * @OA\Response(response="422", description="Request invalid. see errors"),
     * )
     *
     */
    public function calculatePrice(FilmBookingRequest $request, FilmService $service) {
        try {
            $dateIni    = Carbon::parse($request->input('date_begin'));
            $totalPrice = 0;

            $films = Collection::wrap($request->input('films'))
                               ->map(function (array $line) use ($dateIni, $service, &$totalPrice) {
                                   $film          = Film::findOrFail($line['film_id']);
                                   $dateEnd       = Carbon::parse($line['date_end']);
                                   $bookingPeriod = $dateEnd->diffInDays($dateIni);
                                   $price         = $service->calculatePrice($film, $bookingPeriod);
                                   $totalPrice    += $price;

                                   return [
                                       'film'   => new FilmResource($film),
                                       'period' => $bookingPeriod,
                                       'price'  => $price,
                                   ];
                               });

            return $this->jsonResponse(['films'       => $films,
                                        'total_price' => $totalPrice]);

        } catch (\Exception $exception) {
            //TODO: This is only for debug!!
            return $this->responseWithError($exception->getCode(), $exception->getMessage());
        }
    }
}
