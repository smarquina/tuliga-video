<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 15/08/2020
 * Time: 20:54
 */

namespace App\Http\Models\Film;


use App\Http\Models\BaseModel;


/**
 * App\Http\Models\Film\FilmType
 *
 * @property int                                                                        $id
 * @property string                                                                     $name
 * @property mixed                                                                      $normal_days
 * @property mixed                                                                      $normal_price
 * @property mixed                                                                      $extra_price
 * @property \Illuminate\Support\Carbon|null                                            $created_at
 * @property \Illuminate\Support\Carbon|null                                            $updated_at
 * @property-read int|null                                                              $films_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Models\Film\Film[] $films
 * @method static \Illuminate\Database\Eloquent\Builder|FilmType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmType query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilmType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmType whereExtraPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmType whereNormalDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmType whereNormalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilmType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FilmType extends BaseModel {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'film_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'normal_days',
        'normal_price',
        'extra_price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'         => 'string',
        'normal_days'  => 'numeric',
        'normal_price' => 'numeric',
        'extra_price'  => 'numeric',

    ];

    /**
     * Associated films.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function films(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Film::class, 'film_type_id');
    }

    /**
     * Get film type normal price.
     *
     * @return int
     */
    public function getNormalPriceAttribute(): int {
        return $this->attributes['normal_price'] ?? config('film.default_price');
    }
}
