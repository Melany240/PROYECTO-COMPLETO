<?php

namespace App\Repositories;

use App\Models\Editoriales;
use App\Repositories\BaseRepository;

/**
 * Class EditorialesRepository
 * @package App\Repositories
 * @version May 24, 2021, 11:14 pm UTC
*/

class EditorialesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'aut_id',
        'edi_nombre_empresa',
        'edi_telefono',
        'edi_direccion',
        'edi_correo'
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
        return Editoriales::class;
    }
}
