<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Autores
 * @package App\Models
 * @version May 18, 2021, 10:52 pm UTC
 *
 * @property string $aut_nombres
 * @property string $aut_apellidos
 * @property string $aut_edicion
 * @property string $aut_biografia
 * @property string $aut_ibras
 */
class Autores extends Model
{

    public $table = 'autores';
    protected $primaryKey='aut_id';
    public $timestamps=false;

    public $fillable = [
        'aut_nombres',
        'aut_apellidos',
        'aut_edicion',
        'aut_biografia',
        'aut_ibras'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'aut_id' => 'integer',
        'aut_nombres' => 'string',
        'aut_apellidos' => 'string',
        'aut_edicion' => 'string',
        'aut_biografia' => 'string',
        'aut_ibras' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'aut_nombres' => 'required|string|max:100',
        'aut_apellidos' => 'nullable|string|max:100',
        'aut_edicion' => 'nullable|string|max:100',
        'aut_biografia' => 'nullable|string|max:100',
        'aut_ibras' => 'nullable|string|max:100'
    ];

    
}
