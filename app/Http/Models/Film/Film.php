<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 16/08/2020
 * Time: 9:50
 */

namespace App\Http\Models\Film;


use App\Http\Models\BaseModel;

/**
 * App\Http\Models\Film\Film
 *
 * @property int                                  $id
 * @property string                               $name
 * @property string|null                          $description
 * @property int|null                             $film_genre_id
 * @property int|null                             $film_type_id
 * @property string|null                          $image
 * @property \Illuminate\Support\Carbon|null      $created_at
 * @property \Illuminate\Support\Carbon|null      $updated_at
 * @property-read \App\Http\Models\Film\FilmGenre $genre
 * @property-read \App\Http\Models\Film\FilmType  $type
 * @method static \Illuminate\Database\Eloquent\Builder|Film newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Film newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Film query()
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereFilmGenreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereFilmTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Film whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Film extends BaseModel {

    /**
     * Disk used for storage.
     */
    const DISK = 'films';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'film';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'film_genre_id',
        'film_type_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'          => 'string',
        'description'   => 'string',
        'film_genre_id' => 'integer',
        'film_type_id'  => 'integer',
        'image'         => 'string',
        //'image_thumbnail' => 'string',
    ];

    /**
     * Related Genre.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genre(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(FilmGenre::class, 'film_genre_id');
    }

    /**
     * Related Type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(FilmType::class, 'film_type_id');
    }
}
