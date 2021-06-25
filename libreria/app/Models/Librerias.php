<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Librerias
 * @package App\Models
 * @version May 18, 2021, 10:54 pm UTC
 *
 * @property string $li_rep_legal
 * @property string $li_ubicacion
 * @property string $li_nombre_libreria
 * @property string $li_correo
 * @property string $li_sitio_web
 * @property string $li_telefono
 */
class Librerias extends Model
{


    public $table = 'libreria';
protected $primaryKey='li_id';
    public $timestamps=false;    
 



    public $fillable = [
        'li_rep_legal',
        'li_ubicacion',
        'li_nombre_libreria',
        'li_correo',
        'li_sitio_web',
        'li_telefono'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'li_id' => 'integer',
        'li_rep_legal' => 'string',
        'li_ubicacion' => 'string',
        'li_nombre_libreria' => 'string',
        'li_correo' => 'string',
        'li_sitio_web' => 'string',
        'li_telefono' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'li_rep_legal' => 'nullable|string|max:100',
        'li_ubicacion' => 'nullable|string|max:100',
        'li_nombre_libreria' => 'nullable|string|max:100',
        'li_correo' => 'nullable|string|max:100',
        'li_sitio_web' => 'nullable|string|max:100',
        'li_telefono' => 'nullable'
    ];

    
}
