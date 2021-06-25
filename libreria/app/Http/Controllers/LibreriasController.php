<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLibreriasRequest;
use App\Http\Requests\UpdateLibreriasRequest;
use App\Repositories\LibreriasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LibreriasController extends AppBaseController
{
    /** @var  LibreriasRepository */
    private $libreriasRepository;

    public function __construct(LibreriasRepository $libreriasRepo)
    {
        $this->libreriasRepository = $libreriasRepo;
    }

    /**
     * Display a listing of the Librerias.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $librerias = $this->libreriasRepository->all();

        return view('librerias.index')
            ->with('librerias', $librerias);
    }

    /**
     * Show the form for creating a new Librerias.
     *
     * @return Response
     */
    public function create()
    {
        return view('librerias.create');
    }

    /**
     * Store a newly created Librerias in storage.
     *
     * @param CreateLibreriasRequest $request
     *
     * @return Response
     */
    public function store(CreateLibreriasRequest $request)
    {
        $input = $request->all();

        $librerias = $this->libreriasRepository->create($input);

        Flash::success('Librerias saved successfully.');

        return redirect(route('librerias.index'));
    }

    /**
     * Display the specified Librerias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $librerias = $this->libreriasRepository->find($id);

        if (empty($librerias)) {
            Flash::error('Librerias not found');

            return redirect(route('librerias.index'));
        }

        return view('librerias.show')->with('librerias', $librerias);
    }

    /**
     * Show the form for editing the specified Librerias.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $librerias = $this->libreriasRepository->find($id);

        if (empty($librerias)) {
            Flash::error('Librerias not found');

            return redirect(route('librerias.index'));
        }

        return view('librerias.edit')->with('librerias', $librerias);
    }

    /**
     * Update the specified Librerias in storage.
     *
     * @param int $id
     * @param UpdateLibreriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLibreriasRequest $request)
    {
        $librerias = $this->libreriasRepository->find($id);

        if (empty($librerias)) {
            Flash::error('Librerias not found');

            return redirect(route('librerias.index'));
        }

        $librerias = $this->libreriasRepository->update($request->all(), $id);

        Flash::success('Librerias updated successfully.');

        return redirect(route('librerias.index'));
    }

    /**
     * Remove the specified Librerias from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $librerias = $this->libreriasRepository->find($id);

        if (empty($librerias)) {
            Flash::error('Librerias not found');

            return redirect(route('librerias.index'));
        }

        $this->libreriasRepository->delete($id);

        Flash::success('Librerias deleted successfully.');

        return redirect(route('librerias.index'));
    }
}
