<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas=DB::select("SELECT * FROM users");
       return view('personas.index')
       
        ->with('personas',$personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $personas=DB::select("
            SELECT u.clie_id,
u.name,
u.email,
u.password,
u.clie_telefono,
u.clie_cedula,
u.clie_genero,
u.clie_direccion,
u.clie_tipo,
u.clie_estadocivil,
u.clie_usuario,
u.clie_fenac,

u.clie_estado


FROM users u 
            ");

        return view('personas.create')
         ->with(['personas'=>$personas[0]]);
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $datos=$request->all();
        // dd($datos);
         
         // dd($fecha);
        $f=explode('/',$datos['clie_fenac']);
         $fecha=$f[2].'-'.$f[1].'-'.$f[0];
        $Usuario=new User();
         

         $Usuario->name=$datos['name'];
         $Usuario->email=$datos['email'];
         $Usuario->clie_telefono=$datos['clie_telefono'];
         
         $Usuario->clie_cedula=$datos['clie_cedula'];
         $Usuario->clie_genero=$datos['clie_genero'];
         $Usuario->clie_direccion=$datos['clie_direccion'];
         $Usuario->clie_tipo=$datos['clie_tipo'];
         $Usuario->clie_estadocivil=$datos['clie_estadocivil'];
         $Usuario->clie_usuario=$datos['clie_usuario'];
         $Usuario->clie_fenac=$fecha;

         $Usuario->password=bcrypt($datos['password']);
        $Usuario->save();

 return redirect(route('personas.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personas=user::find($id);
       return view('personas.edit')
       ->with('personas',$personas)
        
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=$request->all();
         $f=explode('/',$datos['clie_fenac']);
         $fecha=$f[2].'-'.$f[1].'-'.$f[0];

         $Usuario=User::find($id);
         
         // $Usuario->name=$datos['name'];
         $Usuario->email=$datos['email'];
         $Usuario->clie_telefono=$datos['clie_telefono'];
         
         $Usuario->clie_cedula=$datos['clie_cedula'];
         $Usuario->clie_genero=$datos['clie_genero'];
         $Usuario->clie_direccion=$datos['clie_direccion'];
         $Usuario->clie_tipo=$datos['clie_tipo'];
         $Usuario->clie_estadocivil=$datos['clie_estadocivil'];
         $Usuario->clie_usuario=$datos['clie_usuario'];
         $Usuario->clie_fenac=$fecha;

         $Usuario->password=bcrypt($datos['password']);
        $Usuario->update();




        return redirect(route('personas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
