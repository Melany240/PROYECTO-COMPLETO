<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAutoresRequest;
use App\Http\Requests\UpdateAutoresRequest;
use App\Repositories\AutoresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AutoresController extends AppBaseController
{
    /** @var  AutoresRepository */
    private $autoresRepository;

    public function __construct(AutoresRepository $autoresRepo)
    {
        $this->autoresRepository = $autoresRepo;
    }

    /**
     * Display a listing of the Autores.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $autores = $this->autoresRepository->all();

        return view('autores.index')
            ->with('autores', $autores);
    }

    /**
     * Show the form for creating a new Autores.
     *
     * @return Response
     */
    public function create()
    {
        return view('autores.create');
    }

    /**
     * Store a newly created Autores in storage.
     *
     * @param CreateAutoresRequest $request
     *
     * @return Response
     */
    public function store(CreateAutoresRequest $request)
    {
        $input = $request->all();

        $autores = $this->autoresRepository->create($input);

        Flash::success('Autores saved successfully.');

        return redirect(route('autores.index'));
    }

    /**
     * Display the specified Autores.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $autores = $this->autoresRepository->find($id);

        if (empty($autores)) {
            Flash::error('Autores not found');

            return redirect(route('autores.index'));
        }

        return view('autores.show')->with('autores', $autores);
    }

    /**
     * Show the form for editing the specified Autores.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $autores = $this->autoresRepository->find($id);

        if (empty($autores)) {
            Flash::error('Autores not found');

            return redirect(route('autores.index'));
        }

        return view('autores.edit')->with('autores', $autores);
    }

    /**
     * Update the specified Autores in storage.
     *
     * @param int $id
     * @param UpdateAutoresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAutoresRequest $request)
    {
        $autores = $this->autoresRepository->find($id);

        if (empty($autores)) {
            Flash::error('Autores not found');

            return redirect(route('autores.index'));
        }

        $autores = $this->autoresRepository->update($request->all(), $id);

        Flash::success('Autores updated successfully.');

        return redirect(route('autores.index'));
    }

    /**
     * Remove the specified Autores from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $autores = $this->autoresRepository->find($id);

        if (empty($autores)) {
            Flash::error('Autores not found');

            return redirect(route('autores.index'));
        }

        $this->autoresRepository->delete($id);

        Flash::success('Autores deleted successfully.');

        return redirect(route('autores.index'));
    }
}
