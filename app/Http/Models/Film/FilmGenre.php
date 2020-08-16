<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 15/08/2020
 * Time: 20:37
 */

namespace App\Http\Models\Film;


use App\Http\Models\BaseModel;

/**
 * App\Http\Models\Film\FilmGenre
 *
 * @property int                             $id
 * @property string                          $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmGenre whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Models\Film\Film[] $films
 * @property-read int|null $films_count
 */
class FilmGenre extends BaseModel {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'film_genre';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['name' => 'string'];

    /**
     * Associated films
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function films(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Film::class, 'film_genre_id');
    }
}
