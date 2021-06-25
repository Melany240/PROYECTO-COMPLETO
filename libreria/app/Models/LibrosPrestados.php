<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LibrosPrestados
 * @package App\Models
 * @version May 26, 2021, 11:02 pm UTC
 *
 * @property \App\Models\Libro $lib
 * @property \App\Models\User $clie
 * @property integer $clie_id
 * @property integer $lib_id
 * @property string $lp_fecha_inicio
 * @property string $lp_fecha_entrega
 */
class LibrosPrestados extends Model
{
 

    public $table = 'libros_prestados';
     protected $primaryKey='lp_id';
    public $timestamps=false;
    
 




    public $fillable = [
        'clie_id',
        'lib_id',
        'lp_fecha_inicio',
        'lp_fecha_entrega'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'lp_id' => 'integer',
        'clie_id' => 'integer',
        'lib_id' => 'integer',
        'lp_fecha_inicio' => 'date',
        'lp_fecha_entrega' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'clie_id' => 'nullable|integer',
        'lib_id' => 'nullable|integer',
        'lp_fecha_inicio' => 'nullable',
        'lp_fecha_entrega' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lib()
    {
        return $this->belongsTo(\App\Models\Libro::class, 'lib_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function clie()
    {
        return $this->belongsTo(\App\Models\User::class, 'clie_id');
    }
}
