<?php

namespace App\Repositories;

use App\Models\Libros;
use App\Repositories\BaseRepository;

/**
 * Class LibrosRepository
 * @package App\Repositories
 * @version May 24, 2021, 8:58 pm UTC
*/

class LibrosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Libros::class;
    }
}
