<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 18/08/2020
 * Time: 19:50
 */

namespace App\Http\Repositories\Film;


use App\Http\Repositories\RepositoryInterface;

interface FilmRepositoryInterface extends RepositoryInterface {

    public function findByTypeOrGenre(int $type = null, int $genre = null);
}
