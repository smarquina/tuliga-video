<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 18/08/2020
 * Time: 18:45
 */

namespace App\Http\Repositories\Film;


use App\Http\Models\Film\Film;
use App\Http\Repositories\RepositoryInterface;

class FilmRepository implements RepositoryInterface {

    /**
     * Find Films by Type or Genre.
     *
     * @param int|null $type
     * @param int|null $genre
     * @return \Illuminate\Support\Collection|mixed
     */
    public function findByTypeOrGenre(int $type = null, int $genre = null) {
        $films = isset($type) || isset($genre)
            ? Film::select(['*'])
            : Film::all();

        $type === null ?: $films = $films->where('film_type_id', $type);
        $genre === null ?: $films = $films->where('film_genre_id', $genre);

        return $films->get();
    }
}
