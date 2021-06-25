<?php

namespace App\Repositories;

use App\Models\Autores;
use App\Repositories\BaseRepository;

/**
 * Class AutoresRepository
 * @package App\Repositories
 * @version May 18, 2021, 10:52 pm UTC
*/

class AutoresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'aut_nombres',
        'aut_apellidos',
        'aut_edicion',
        'aut_biografia',
        'aut_ibras'
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
        return Autores::class;
    }
}
