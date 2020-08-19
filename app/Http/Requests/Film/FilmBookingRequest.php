<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 18/08/2020
 * Time: 18:19
 */

namespace App\Http\Requests\Film;


use App\Http\Requests\ApiRequest;
use Illuminate\Support\Str;

/**
 * Class FilmBookingRequest
 * @package App\Http\Requests\Film
 */
class FilmBookingRequest extends ApiRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array {
        return [
            'date_begin'       => 'required|date',
            'films'            => 'required|array',
            'films.*.film_id'  => 'required|integer|exists:film,id',
            'films.*.date_end' => 'required|date|after:date_begin',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes() {
        return [
            'date_begin'       => Str::lower(trans('film.date_begin')),
            'films'            => Str::lower(trans('film.film')),
            'films.*.film_id'  => Str::lower(trans('film.film')),
            'films.*.date_end' => Str::lower(trans('film.date_end')),
        ];
    }
}
