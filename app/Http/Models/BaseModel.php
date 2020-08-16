<?php
/**
 * Created for tuliga-video.
 * User: Sergio Martin Marquina
 * Email: smarquina@zenos.es
 * Date: 15/08/2020
 * Time: 20:37
 */

namespace App\Http\Models;

use Illuminate\Database\Query\Builder;


/**
 * App\Http\Models\BaseModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\BaseModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\BaseModel comboList()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\BaseModel comboJson()
 * @mixin \Eloquent
 */
class BaseModel extends \Eloquent {

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
