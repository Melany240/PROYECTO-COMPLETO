<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLibrosPrestadosRequest;
use App\Http\Requests\UpdateLibrosPrestadosRequest;
use App\Repositories\LibrosPrestadosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\User;
use App\Models\Libros;
use DB;


class LibrosPrestadosController extends AppBaseController
{
    /** @var  LibrosPrestadosRepository */
    private $librosPrestadosRepository;

    public function __construct(LibrosPrestadosRepository $librosPrestadosRepo)
    {
        $this->librosPrestadosRepository = $librosPrestadosRepo;
    }

    /**
     * Display a listing of the LibrosPrestados.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $librosPrestados = $this->librosPrestadosRepository->all();
$librosPrestados=DB::select("
    SELECT  lb.lp_id,
l.lib_id,
l.lib_nombres_libros,
u.clie_id,
u.name,
lb.lp_fecha_inicio,
lb.lp_fecha_entrega

FROM libros_prestados lb

JOIN libros l ON lb.lib_id=l.lib_id
JOIN users u ON lb.clie_id=u.clie_id
GROUP BY  lb.lp_id
");
        return view('libros_prestados.index')
            ->with('librosPrestados', $librosPrestados);
    }

    /**
     * Show the form for creating a new LibrosPrestados.
     *
     * @return Response
     */
    public function create()
    {
        $libros=Libros::pluck('lib_nombres_libros','lib_id');
        $clientes=User::pluck('name','clie_id');

        return view('libros_prestados.create')
              ->with('libros',$libros)
              ->with('clientes',$clientes);
    }

    /**
     * Store a newly created LibrosPrestados in storage.
     *
     * @param CreateLibrosPrestadosRequest $request
     *
     * @return Response
     */
    public function store(CreateLibrosPrestadosRequest $request)
    {
        $input = $request->all();

        $librosPrestados = $this->librosPrestadosRepository->create($input);

        Flash::success('Libros Prestados saved successfully.');

        return redirect(route('librosPrestados.index'));
    }

    /**
     * Display the specified LibrosPrestados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $librosPrestados = $this->librosPrestadosRepository->find($id);

        if (empty($librosPrestados)) {
            Flash::error('Libros Prestados not found');

            return redirect(route('librosPrestados.index'));
        }

        return view('libros_prestados.show')->with('librosPrestados', $librosPrestados);
    }

    /**
     * Show the form for editing the specified LibrosPrestados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $librosPrestados = $this->librosPrestadosRepository->find($id);
           $libros=Libros::pluck('lib_nombres_libros','lib_id');
        $clientes=User::pluck('name','clie_id');

        if (empty($librosPrestados)) {
            Flash::error('Libros Prestados not found');

            return redirect(route('librosPrestados.index'));
        }

        return view('libros_prestados.edit')->with('librosPrestados', $librosPrestados)
        ->with('libros',$libros)
              ->with('clientes',$clientes);
    }

    /**
     * Update the specified LibrosPrestados in storage.
     *
     * @param int $id
     * @param UpdateLibrosPrestadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLibrosPrestadosRequest $request)
    {
        $librosPrestados = $this->librosPrestadosRepository->find($id);

        if (empty($librosPrestados)) {
            Flash::error('Libros Prestados not found');

            return redirect(route('librosPrestados.index'));
        }

        $librosPrestados = $this->librosPrestadosRepository->update($request->all(), $id);

        Flash::success('Libros Prestados updated successfully.');

        return redirect(route('librosPrestados.index'));
    }

    /**
     * Remove the specified LibrosPrestados from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $librosPrestados = $this->librosPrestadosRepository->find($id);

        if (empty($librosPrestados)) {
            Flash::error('Libros Prestados not found');

            return redirect(route('librosPrestados.index'));
        }

        $this->librosPrestadosRepository->delete($id);

        Flash::success('Libros Prestados deleted successfully.');

        return redirect(route('librosPrestados.index'));
    }
}
