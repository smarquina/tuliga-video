<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 17/08/2020
 * Time: 8:45
 */

namespace App\Http\Resources\Film;


use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class FilmCollection
 * @package App\Http\Resources\Film
 */
class FilmCollection extends ResourceCollection {

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function toArray($request) {
        return FilmResource::collection($this->collection);
    }
}
