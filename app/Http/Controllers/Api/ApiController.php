<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 17/08/2020
 * Time: 8:59
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="0.1",
 *         title="Tu liga video API",
 *         description="Simple API for Tu liga videoclub.",
 *         @OA\Contact(
 *             email="sergyzen@gmail.com"
 *         ),
 *         @OA\License(
 *             name="Apache 2.0",
 *             url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *         )
 *     ),
 *     @OA\Server(
 *         description="Simple API for Tu liga videoclub.",
 *         url=""
 *     ),
 *     @OA\Tag(name="film", description="view and book films")
 * )
 *
 * @SWG\Swagger(
 *     basePath="/api",
 *     schemes={"https"}
 *     @SWG\Info(
 *         version="1.0.0"
 *     )
 * )
 */
class ApiController extends Controller {
    use Helpers;

    protected $pageLength = 10;
    protected $page       = 1;

    /**
     * ApiController constructor.
     */
    public function __construct() {
        $this->pageLength = request()->get('pageSize', $this->pageLength);
        $this->page       = request()->get('page', $this->page); // Get the ?page=1 from the url;
    }

    /**
     * @param int         $code
     * @param string|null $msg
     * @return \Illuminate\Http\JsonResponse
     */
    protected final function responseWithError(int $code, string $msg = null): \Illuminate\Http\JsonResponse {
        return response()->json(["message"     => $msg ?? Response::$statusTexts[$code] ?? 'Fatal error',
                                 "code"        => $code,
                                 "status_code" => $code,
                                 "status"      => Response::$statusTexts[$code] ?? 'Fatal error',
                                ], $code);
    }

    /**
     * Simulates the Model::paginate response to make all Json responses uniform.
     *
     * @param Collection              $collection
     * @param ResourceCollection|null $resourceCollection
     * @param integer|null            $pageLength
     * @return array
     */
    public function paginate(ResourceCollection $resourceCollection = null, $pageLength = null) {
        $pageLength = $pageLength ?? $this->pageLength;
        $items      = $resourceCollection ?? [];
        $lap        = new LengthAwarePaginator($items, $items->count(), // Total items
                                               $pageLength, // Items per page
                                               $this->page, // Current page
                                               ['path' => request()->url(), 'query' => request()->query()]);
        $lapData    = $lap->toArray();

        return array('data' => array_values($lap->forPage($this->page, $pageLength)->toArray()),

                     'pagination' => ['links'      => ['first' => $lapData['first_page_url'],
                                                       'last'  => $lapData['last_page_url'],
                                                       'prev'  => $lapData['prev_page_url'],
                                                       'next'  => $lapData['next_page_url'],],
                                      'total'      => (int)$lapData['total'],
                                      'pageSize'   => (int)$lapData['per_page'],
                                      'totalPages' => (int)$lapData['last_page'],
                                      'page'       => (int)$lapData['current_page'],
                                      'from'       => (int)$lapData['from'],
                                      'to'         => (int)$lapData['to'],]);
    }
}
