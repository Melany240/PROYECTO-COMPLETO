<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Libros
 * @package App\Models
 * @version May 24, 2021, 8:58 pm UTC
 *
 * @property \App\Models\EditorialProvedor $edi
 * @property \App\Models\Librerium $li
 * @property \Illuminate\Database\Eloquent\Collection $librosPrestados
 * @property integer $li_id
 * @property integer $edi_id
 * @property string $lib_autores_
 * @property string $lib_nombres_libros
 * @property string $lib_ano
 * @property string $lib_categoria
 * @property string $lib_editorial_
 * @property string $lib_clasificacion_
 */
class Libros extends Model
{
    

    public $table = 'libros';
    
    

    
    protected $primaryKey='lib_id';
    public $timestamps=false;



    public $fillable = [
        'li_id',
        'edi_id',
        'lib_autores_',
        'lib_nombres_libros',
        'lib_ano',
        'lib_categoria',
        'lib_editorial_',
        'lib_clasificacion_'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'lib_id' => 'integer',
        'li_id' => 'integer',
        'edi_id' => 'integer',
        'lib_autores_' => 'string',
        'lib_nombres_libros' => 'string',
        'lib_ano' => 'string',
        'lib_categoria' => 'string',
        'lib_editorial_' => 'string',
        'lib_clasificacion_' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'li_id' => 'nullable|integer',
        'edi_id' => 'nullable|integer',
        'lib_autores_' => 'nullable|string|max:100',
        'lib_nombres_libros' => 'nullable|string|max:100',
        'lib_ano' => 'nullable|string|max:100',
        'lib_categoria' => 'nullable|string|max:100',
        'lib_editorial_' => 'nullable|string|max:100',
        'lib_clasificacion_' => 'nullable|string|max:100'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function edi()
    {
        return $this->belongsTo(\App\Models\EditorialProvedor::class, 'edi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function li()
    {
        return $this->belongsTo(\App\Models\Librerium::class, 'li_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function librosPrestados()
    {
        return $this->hasMany(\App\Models\LibrosPrestado::class, 'lib_id');
    }
}
