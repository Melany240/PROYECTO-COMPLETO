<?php

namespace App\Repositories;

use App\Models\Librerias;
use App\Repositories\BaseRepository;

/**
 * Class LibreriasRepository
 * @package App\Repositories
 * @version May 18, 2021, 10:54 pm UTC
*/

class LibreriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'li_rep_legal',
        'li_ubicacion',
        'li_nombre_libreria',
        'li_correo',
        'li_sitio_web',
        'li_telefono'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Librerias::class;
    }
}
