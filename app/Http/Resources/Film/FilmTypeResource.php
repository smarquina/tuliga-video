<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 17/08/2020
 * Time: 8:48
 */

namespace App\Http\Resources\Film;


use App\Http\Models\Film\FilmType;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class FilmTypeResource
 * @package App\Http\Resources\FilmType
 * @OA\Schema(schema="FilmType", type="object")
 */
class FilmTypeResource extends JsonResource {

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
     *   property="normal_days",
     *   type="integer",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="normal_price",
     *   type="number",
     *   nullable=false,
     * )
     */

    /**
     * @OA\Property(
     *   property="extra_price",
     *   type="number",
     *   nullable=true,
     * )
     */

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        /** @var FilmType $filmType */
        $filmType = clone $this;

        return [
            'id'           => $filmType->id,
            'name'         => $filmType->name,
            'normal_days'  => $filmType->normal_days,
            'normal_price' => $filmType->normal_price,
            'extra_price'  => $filmType->extra_price,
        ];
    }
}
