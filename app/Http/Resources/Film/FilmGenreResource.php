<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 17/08/2020
 * Time: 8:52
 */

namespace App\Http\Resources\Film;


use App\Http\Models\Film\FilmGenre;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class FilmGenreResource
 * @package App\Http\Resources\FilmGenre
 * @OA\Schema(schema="FilmGenre", type="object")
 */
class FilmGenreResource extends JsonResource {

    /**
     * @OA\Property(
     *   property="id",
     *   type="integer",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="name",
     *   type="string",
     *   nullable=false,
     * )
     */


    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        /** @var FilmGenre $filmGenre */
        $filmGenre = clone $this;

        return [
            'id'   => $filmGenre->id,
            'name' => $filmGenre->name,
        ];
    }
}
