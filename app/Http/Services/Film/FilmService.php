<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 17/08/2020
 * Time: 11:03
 */

namespace App\Http\Services\Film;


use App\Http\Models\Film\Film;

class FilmService {

    public static function filterFilms(int $type = null, int $genre = null) {
        $films = isset($type) || isset($genre)
            ? Film::select(['*'])
            : Film::all();

        $type === null ?: $films = $films->where('film_type_id', $type);
        $genre === null ?: $films = $films->where('film_genre_id', $genre);

        return $films->get();
    }
}
