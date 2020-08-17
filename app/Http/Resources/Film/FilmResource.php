<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 17/08/2020
 * Time: 8:46
 */

namespace App\Http\Resources\Film;


use App\Http\Models\Film\Film;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class FilmResource
 * @package App\Http\Resources\Film
 * @OA\Schema(schema="Film", type="object")
 */
class FilmResource extends JsonResource {

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
     * @OA\Property(
     *   property="description",
     *   type="string",
     *   nullable=true,
     * )
     */

    /**
     * @OA\Property(
     *   property="type",
     *   ref="#/components/schemas/FilmType",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="genre",
     *   ref="#/components/schemas/FilmGenre",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="image",
     *   type="string",
     *   nullable=true,
     * )
     */

    /**
     * @OA\Property(
     *   property="last_updated",
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
        /** @var Film $film */
        $film = clone $this;

        return [
            'id'           => $film->id,
            'name'         => $film->name,
            'description'  => $film->description,
            'type'         => new FilmTypeResource($film->type),
            'genre'        => new FilmGenreResource($film->genre),
            'image'        => \Storage::disk(Film::DISK)->url($film->image),
            'last_updated' => $film->updated_at->toDate(),
        ];
    }
}
