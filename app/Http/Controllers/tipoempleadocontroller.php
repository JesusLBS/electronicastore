<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipoempleados; 
use App\Models\empleados;

use Session;

class tipoempleadocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $consulta = tipoempleados::orderBy('id_tipo_empleado','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = tipoempleados::withTrashed()->select(['id_tipo_empleado','nombre_tipoempleado','deleted_at'])
                                       ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{ 
            $id_sigue = $consulta[0]->id_tipo_empleado + 1;
        } 

        //return $id_sigue;

        return view ('tipoempleado/index')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);
    }

    public function desactivartempleado($id_tipo_empleado)
    {
        // Desactivacion
        $tipoempleados = tipoempleados::find($id_tipo_empleado);
        $tipoempleados->delete();
        Session::flash('mensajed',"El tipo empleado ha sido Desactivado correctamente");

        return redirect()->to('electronica_templeado');
    }
    public function activartempleado($id_tipo_empleado)
    {
        // Activacion
        tipoempleados::withTrashed()->where('id_tipo_empleado',$id_tipo_empleado)->restore();
        
        Session::flash('mensaje',"El tipo empleado ha sido Activado correctamente");

        return redirect()->to('electronica_templeado');
    }
    public function borrartempleado($id_tipo_empleado)
    {
        // Eliminacion


        $buscatipem = empleados::where('id_tipo_empleado',$id_tipo_empleado)->get();
        $cuantos = count($buscatipem);
        if ($cuantos == 0) {
            $tipoempleados = tipoempleados::withTrashed()->find($id_tipo_empleado)->forceDelete();
            Session::flash('mensajedelete',"Informacion del tipo empleado ha sido Eliminada correctamente");
            return redirect()->to('electronica_templeado');
                        
        }
        else{
            Session::flash('mensajed',"El  tipo empleado no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_templeado');
                        

        }
        
    }
   
    public function guardartempleado(Request $request)
    {     
        
        $this->validate($request,[
            'nombre_tipoempleado' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
        ]);

        $templeado = new tipoempleados;

         
        $templeado->id_tipo_empleado          = $request->input('id_tipo_empleado'); 
        $templeado->nombre_tipoempleado       = $request->input('nombre_tipoempleado'); 
        

           
        $templeado->save();

        Session::flash('mensaje',"El  tipo empleado  $request->nombre_tipoempleado ha sido agregado correctamente");
        return redirect()->to('electronica_templeado');
 
       
    }

    public function editar_templeado($id_tipo_empleado)
    {
        $datatempleado = tipoempleados::withTrashed()->find($id_tipo_empleado);
        return view ('tipoempleado.edit',['datatempleado'=>$datatempleado]); 

        
    }

    

    public function updatetempleado(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[
            'id_tipo_empleado'    => 'required',
            'nombre_tipoempleado' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $datatempleado = tipoempleados::withTrashed()->find($request->id_tipo_empleado);

       
        
        $datatempleado->nombre_tipoempleado =  $request->nombre_tipoempleado;
        $datatempleado->save();

        Session::flash('mensaje',"La tipo empleado $request->nombre_tipoempleado ha sido Actualizado correctamente");
        return redirect()->to('electronica_templeado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
