<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Facturas
 * @package App\Models
 * @version May 26, 2021, 11:06 pm UTC
 *
 * @property \App\Models\Librerium $li
 * @property \App\Models\User $clie
 * @property \App\Models\Libro $lib
 * @property \Illuminate\Database\Eloquent\Collection $facturaDetalles
 * @property integer $li_id
 * @property integer $clie_id
 * @property integer $lib_id
 * @property integer $fac_numero
 * @property string $fac_fecha
 */
class Facturas extends Model
{
 

    public $table = 'factura';
     protected $primaryKey='fac_id';
     public $timestamps=false;

    



    public $fillable = [
        'li_id',
        'clie_id',
    
        'fac_numero',
        'fac_fecha',
        'fac_iva',
        'fac_descuento'

            ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fac_id' => 'integer',
        'li_id' => 'integer',
        'clie_id' => 'integer',
       
        'fac_numero' => 'integer',
        'fac_fecha' => 'date',
        'fac_iva' => 'numeric',
        'fac_descuento' => 'numeric'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'li_id' => 'nullable|integer',
        'clie_id' => 'nullable|integer',
        
        'fac_numero' => 'nullable|integer',
        'fac_fecha' => 'nullable',
        'fac_iva' => 'nullable',
        'fac_descuento' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function li()
    {
        return $this->belongsTo(\App\Models\Librerium::class, 'li_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function clie()
    {
        return $this->belongsTo(\App\Models\User::class, 'clie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lib()
    {
        return $this->belongsTo(\App\Models\Libro::class, 'lib_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function facturaDetalles()
    {
        return $this->hasMany(\App\Models\FacturaDetalle::class, 'fac_id');
    }
}
