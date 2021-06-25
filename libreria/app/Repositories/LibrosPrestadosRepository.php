<?php

namespace App\Repositories;

use App\Models\LibrosPrestados;
use App\Repositories\BaseRepository;

/**
 * Class LibrosPrestadosRepository
 * @package App\Repositories
 * @version May 26, 2021, 11:02 pm UTC
*/

class LibrosPrestadosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'clie_id',
        'lib_id',
        'lp_fecha_inicio',
        'lp_fecha_entrega'
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
        return LibrosPrestados::class;
    }
}
