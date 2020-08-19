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

    /**
     * Film price calculator.
     *
     * @param Film $film
     * @param int  $days
     * @return float|int
     */
    public function calculatePrice(Film $film, int $days) {
        $type = $film->type;

        if (!$type->normal_days) {
            $price = $days * $type->normal_price;
        } else {
            $normalDays = $days >= $type->normal_days ? $type->normal_days : $days;
            $extraDays  = $days >= $type->normal_days ? $days - $normalDays : 0;
            $price      = ($normalDays * $type->normal_price) + ($extraDays * $type->extra_price);
        }

        return $price;
    }
}
