<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Editoriales
 * @package App\Models
 * @version May 24, 2021, 11:14 pm UTC
 *
 * @property \App\Models\Autore $aut
 * @property \Illuminate\Database\Eloquent\Collection $libreria
 * @property integer $aut_id
 * @property string $edi_nombre_empresa
 * @property string $edi_telefono
 * @property string $edi_direccion
 * @property string $edi_correo
 */
class Editoriales extends Model
{
  

    public $table = 'editorial_provedor';

   

    protected $primaryKey='edi_id';
    public $timestamps=false;
    



    public $fillable = [
        'aut_id',
        'edi_nombre_empresa',
        'edi_telefono',
        'edi_direccion',
        'edi_correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'edi_id' => 'integer',
        'aut_id' => 'integer',
        'edi_nombre_empresa' => 'string',
        'edi_telefono' => 'string',
        'edi_direccion' => 'string',
        'edi_correo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'aut_id' => 'nullable|integer',
        'edi_nombre_empresa' => 'nullable|string|max:100',
        'edi_telefono' => 'nullable|string|max:100',
        'edi_direccion' => 'nullable|string|max:100',
        'edi_correo' => 'nullable|string|max:100'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function aut()
    {
        return $this->belongsTo(\App\Models\Autore::class, 'aut_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function libreria()
    {
        return $this->belongsToMany(\App\Models\Librerium::class, 'libros');
    }
}
