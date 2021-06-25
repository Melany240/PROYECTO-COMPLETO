<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FacturaDetalles
 * @package App\Models
 * @version May 26, 2021, 11:05 pm UTC
 *
 * @property \App\Models\Factura $fac
 * @property integer $fac_id
 * @property string $fac_tipo_pago
 * @property string $fac_descripcion
 * @property integer $fac_iva
 * @property integer $fac_descuento
 * @property integer $fac_valor_total
 */
class FacturaDetalles extends Model
{
   

    public $table = 'factura_detalle';
     protected $primaryKey='fade_id';
    public $timestamps=false;
    



    public $fillable = [
        'fac_id',
        'lib_id',
        'fade_cant',
        'fade_vu'
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fac_id' => 'integer',
        'lib_id' => 'integer',
        'fade_cant' => 'numeric',
        'fade_vu' => 'numeric'
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fac_id' => 'nullable|integer',
        'lib_id' => 'nullable|integer'
        // 'fac_tipo_pago' => 'nullable|string|max:100',
        // 'fac_descripcion' => 'nullable|string|max:100',
        // 'fac_iva' => 'nullable|integer',
        // 'fac_descuento' => 'nullable|integer',
        // 'fac_valor_total' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fac()
    {
        return $this->belongsTo(\App\Models\Factura::class, 'fac_id');
    }
}
