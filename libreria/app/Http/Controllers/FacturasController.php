<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFacturasRequest;
use App\Http\Requests\UpdateFacturasRequest;
use App\Repositories\FacturasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Libros;
use App\User;
use App\Models\Librerias;
use App\Models\FacturaDetalles;
use DB;
use PDF;

class FacturasController extends AppBaseController
{
    /** @var  FacturasRepository */
    private $facturasRepository;

    public function __construct(FacturasRepository $facturasRepo)
    {
        $this->facturasRepository = $facturasRepo;
    }

    /**
     * Display a listing of the Facturas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $facturas = $this->facturasRepository->all();
        $facturas=DB::select("
            SELECT f.fac_id,
f.fac_descuento,
f.fac_iva,
SUM(fd.fade_cant*fd.fade_vu)AS subt,
u.name,
l.li_nombre_libreria,
lb.lib_nombres_libros,
f.fac_numero,
f.fac_fecha
FROM factura f
JOIN factura_detalle fd ON f.fac_id=fd.fac_id
JOIN users u ON f.clie_id=u.clie_id
JOIN libreria l ON f.li_id=l.li_id
JOIN libros lb ON fd.lib_id=lb.lib_id
GROUP BY f.fac_id,
fd.fade_id
            ");


        return view('facturas.index')
            ->with('facturas', $facturas);
    }

    /**
     * Show the form for creating a new Facturas.
     *
     * @return Response
     */
    public function create()
    {
        $libros=Libros::pluck('lib_nombres_libros','lib_id');
        $clientes=User::pluck('name','clie_id');
        $librerias=Librerias::pluck('li_nombre_libreria','li_id');
        $aux_fac=DB::select("SELECT * FROM factura ORDER BY fac_numero DESC LIMIT 1");

       if(empty($aux_fac)){
            //$facNo='001-001-000000001';
            $facNo=1;
        }else{
            $facNo=($aux_fac[0]->fac_numero)+1;
        }
       // dd($create);
        return view('facturas.create')
          ->with('libros',$libros)
          ->with('clientes',$clientes)
          ->with('librerias',$librerias)
          ->with('facNo',$facNo)
        ;
    }

    /**
     * Store a newly created Facturas in storage.
     *
     * @param CreateFacturasRequest $request
     *
     * @return Response
     */
    public function store(CreateFacturasRequest $request)
    {
        $input = $request->all();
        $input['fac_fecha']=date('Y-m-d');
        $facturas= $this->facturasRepository->create($input);
        // dd($factura->fac_id);
        $Detalles=new FacturaDetalles;
        
            $Detalles->fac_id=$facturas->fac_id;
            $Detalles->lib_id=$input['lib_id'];
            
            
            $Detalles->fade_cant=$input['fade_cant'];
            $Detalles->fade_vu=$input['fade_vu'];
            $Detalles->save();



        Flash::success('Factura savedGuardada Correctamente.');
return redirect(route('facturas.edit',$facturas->fac_id));
    }

    /**
     * Display the specified Facturas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
                 $facturas=DB::select("
                                SELECT f.fac_id,
                    f.fac_descuento,
                    f.fac_iva,
                    SUM(fd.fade_cant*fd.fade_vu)AS subt,
                    u.name,
                    u.clie_cedula,
                    u.clie_direccion,
                    u.clie_telefono,
                    l.li_nombre_libreria,
                    l.li_ubicacion,
                    l.li_correo,
                    l.li_sitio_web,
                    l.li_telefono,
                    lb.lib_nombres_libros,
                    f.fac_numero,
                    f.fac_descuento,
                    f.fac_iva,
                    f.fac_fecha
                    FROM factura f
                    JOIN factura_detalle fd ON f.fac_id=fd.fac_id
                    JOIN users u ON f.clie_id=u.clie_id
                    JOIN libreria l ON f.li_id=l.li_id
                    JOIN libros lb ON fd.lib_id=lb.lib_id
                    GROUP BY f.fac_id,
                    fd.fade_id
                                ");
                 // dd($facturas);
                $detalle=DB::select("
                            SELECT * FROM factura_detalle fd
                            JOIN libros lb ON fd.lib_id=lb.lib_id
                            WHERE fd.fac_id=$id
                            ");
        $pdf=app('dompdf.wrapper');
        $pdf->loadView('facturas.show',['facturas'=>$facturas[0],'detalle'=>$detalle]);
        return $pdf->stream();
        // $facturas = $this->facturasRepository->find($id);

        // if (empty($facturas)) {
        //     Flash::error('Facturas not found');

        //     return redirect(route('facturas.index'));
        // }

        // return view('facturas.show')->with('facturas', $facturas);
    }

    /**
     * Show the form for editing the specified Facturas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facturas = $this->facturasRepository->find($id);
         $libros=Libros::pluck('lib_nombres_libros','lib_id');
        $clientes=User::pluck('name','clie_id');
        $facNo=$facturas->facNo;
        $librerias=Librerias::pluck('li_nombre_libreria','li_id');
        $facturaDetalles=DB::select("SELECT * FROM factura_detalle fd
                                     JOIN libros lb ON lb.lib_id=fd.lib_id
                                     WHERE fd.fac_id=$id");

        // if (empty($facturas)) {
        //     Flash::error('Facturas not found');

        //     return redirect(route('facturas.index'));
        // }

        return view('facturas.edit')
        ->with('facturas', $facturas)
        ->with('libros',$libros)
          ->with('clientes',$clientes)
          ->with('facNo',$facNo)
          ->with('librerias',$librerias)
          ->with('facturaDetalles',$facturaDetalles);

    }

    /**
     * Update the specified Facturas in storage.
     *
     * @param int $id
     * @param UpdateFacturasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacturasRequest $request)
    {

       $input=$request->all();
        $auxfacturas = $this->facturasRepository->find($id);
        //ACTUALIZO EL ENCABEZADO
        if(isset($input['fac_iva']) ){
            $input['fac_iva']=1; ///1=>calcule el iva 
        }else{
            $input['fac_iva']=0; ///0=>no calcule el iva
        }
        $facturas = $this->facturasRepository->update($input, $id);
        //INSERTO EL NUEVO DETALLE SI TENGO LOS VALORES DE CANTIDAD Y VU
        if($input['fade_cant']!=null && $input['fade_vu']!=null){

        $Detalle=new FacturaDetalles;
        $Detalle->fac_id=$id;
        $Detalle->lib_id=$input['lib_id'];
        $Detalle->fade_cant=$input['fade_cant'];
        $Detalle->fade_vu=$input['fade_vu'];
        $Detalle->save();
        return redirect(route('facturas.edit',$id));
        // if (empty($facturas)) {
        //     Flash::error('Facturas not found');

        //     return redirect(route('facturas.index'));
        // }

        // Flash::success('Facturas updated successfully.');
        }
        return redirect(route('facturas.index')); 
    }

    /**
     * Remove the specified Facturas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
       DB::select("DELETE FROM factura_detalle where fac_id=$id");
        DB::select("DELETE FROM factura where fac_id=$id");

        return redirect(route('facturas.index'));
    }
}
