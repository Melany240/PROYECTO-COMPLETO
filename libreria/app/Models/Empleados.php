<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Empleados
 * @package App\Models
 * @version May 25, 2021, 12:43 am UTC
 *
 * @property \App\Models\Librerium $li
 * @property integer $li_id
 * @property string $emp_nombres
 * @property string $emp_apellidos
 * @property string $emp_cedula
 * @property string $emp_direccion
 * @property string $emp_telefono
 * @property string $emp_correo
 */
class Empleados extends Model
{
    

    public $table = 'empleados';
    
     protected $primaryKey='emp_id';
    public $timestamps=false;


    public $fillable = [
        'li_id',
        'emp_nombres',
        'emp_apellidos',
        'emp_cedula',
        'emp_direccion',
        'emp_telefono',
        'emp_correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'emp_id' => 'integer',
        'li_id' => 'integer',
        'emp_nombres' => 'string',
        'emp_apellidos' => 'string',
        'emp_cedula' => 'string',
        'emp_direccion' => 'string',
        'emp_telefono' => 'string',
        'emp_correo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'li_id' => 'nullable|integer',
        'emp_nombres' => 'nullable|string|max:100',
        'emp_apellidos' => 'nullable|string|max:100',
        'emp_cedula' => 'nullable|string|max:100',
        'emp_direccion' => 'nullable|string|max:100',
        'emp_telefono' => 'nullable|string|max:100',
        'emp_correo' => 'nullable|string|max:100'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function li()
    {
        return $this->belongsTo(\App\Models\Librerium::class, 'li_id');
    }
}
