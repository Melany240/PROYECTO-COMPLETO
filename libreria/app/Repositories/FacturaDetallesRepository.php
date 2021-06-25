<?php

namespace App\Repositories;

use App\Models\FacturaDetalles;
use App\Repositories\BaseRepository;

/**
 * Class FacturaDetallesRepository
 * @package App\Repositories
 * @version May 26, 2021, 11:05 pm UTC
*/

class FacturaDetallesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fac_id',
        'lib_id',
        'fade_cant',
        'fade_vu'
       
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
        return FacturaDetalles::class;
    }
}
