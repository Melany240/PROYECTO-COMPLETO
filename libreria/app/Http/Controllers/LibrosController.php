<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLibrosRequest;
use App\Http\Requests\UpdateLibrosRequest;
use App\Repositories\LibrosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Librerias;
use App\Models\Editoriales;
use DB;

class LibrosController extends AppBaseController
{
    /** @var  LibrosRepository */
    private $librosRepository;

    public function __construct(LibrosRepository $librosRepo)
    {
        $this->librosRepository = $librosRepo;
    }

    /**
     * Display a listing of the Libros.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $libros = $this->librosRepository->all();
        $libros=DB::select("
SELECT lb.lib_id,
l.li_nombre_libreria,
e.edi_nombre_empresa,
lb.lib_autores_,
lb.lib_nombres_libros,
lb.lib_ano,
lb.lib_categoria,
lb.lib_editorial_,
lb.lib_clasificacion_
FROM libros lb
JOIN libreria l ON lb.li_id=l.li_id
JOIN editorial_provedor e ON lb.edi_id=e.edi_id

GROUP BY lb.lib_id
            ");
        return view('libros.index')
            ->with('libros', $libros);
    }

    /**
     * Show the form for creating a new Libros.
     *
     * @return Response
     */
    public function create()
    {
        $librerias=Librerias::pluck('li_nombre_libreria','li_id');
        $editoriales=Editoriales::pluck('edi_nombre_empresa','edi_id');
        return view('libros.create')
        ->with('librerias',$librerias)
        ->with('editoriales',$editoriales);
    }

    /**
     * Store a newly created Libros in storage.
     *
     * @param CreateLibrosRequest $request
     *
     * @return Response
     */
    public function store(CreateLibrosRequest $request)
    {
        $input = $request->all();

        $libros = $this->librosRepository->create($input);

        Flash::success('Libros saved successfully.');

        return redirect(route('libros.index'));
    }

    /**
     * Display the specified Libros.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $libros = $this->librosRepository->find($id);

        if (empty($libros)) {
            Flash::error('Libros not found');

            return redirect(route('libros.index'));
        }

        return view('libros.show')->with('libros', $libros);
    }

    /**
     * Show the form for editing the specified Libros.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $libros = $this->librosRepository->find($id);
        $librerias=Librerias::pluck('li_nombre_libreria','li_id');
        $editoriales=Editoriales::pluck('edi_nombre_empresa','edi_id');

        if (empty($libros)) {
            Flash::error('Libros not found');

            return redirect(route('libros.index'));
        }

        return view('libros.edit')->with('libros', $libros)
        ->with('librerias',$librerias)
        ->with('editoriales',$editoriales);
    }

    /**
     * Update the specified Libros in storage.
     *
     * @param int $id
     * @param UpdateLibrosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLibrosRequest $request)
    {
        $libros = $this->librosRepository->find($id);

        if (empty($libros)) {
            Flash::error('Libros not found');

            return redirect(route('libros.index'));
        }

        $libros = $this->librosRepository->update($request->all(), $id);

        Flash::success('Libros updated successfully.');

        return redirect(route('libros.index'));
    }

    /**
     * Remove the specified Libros from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $libros = $this->librosRepository->find($id);

        if (empty($libros)) {
            Flash::error('Libros not found');

            return redirect(route('libros.index'));
        }

        $this->librosRepository->delete($id);

        Flash::success('Libros deleted successfully.');

        return redirect(route('libros.index'));
    }
}
