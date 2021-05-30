<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empleados;
use App\Models\User;
use App\Models\estados;
use App\Models\municipios;
use App\Models\tipoempleados;
use DataTables;
use App\Models\departamentos;
use Session;
use PDF;



 


class empleadoscontroller extends Controller
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
    
    public function index(Request $request)
    {
        /*
        $departamentos  = departamentos::orderBy('nombre_departamento')->get();
        $consulta2      = empleados::withTrashed()->join('departamentos','empleados.id_departamento','=','departamentos.id_departamento')
                                             ->select('empleados.id_empleado','empleados.nombre_empleado','empleados.deleted_at','departamentos.nombre_departamento')
                                       ->get();
        return view ('empleado/index')
             ->with('departamentos',$departamentos)
             ->with('consulta2',$consulta2);
             */

        //Start Datatables with ajax

             if ($request->ajax()) {


    $data     = empleados::withTrashed()->join('departamentos','empleados.id_departamento','=','departamentos.id_departamento')
                                             ->select('empleados.id_empleado','empleados.nombre_empleado','empleados.deleted_at','departamentos.nombre_departamento')
                                       ->get();
   return DataTables::of($data)
           ->addIndexColumn()
           ->addColumn('btn',function($data){

               $btn = '&nbsp;';

               if ($data->deleted_at) {
                   $btn .= '<button type="button" name="activauser"  id="'.$data->id_empleado.'" class="activauser btn btn-success  btn-sm" data-toggle="modal" data-target="#mactivarp">Activar</button>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="eliminaruser"  id="'.$data->id_empleado.'" class="eliminaruser btn btn-danger  btn-sm" data-toggle="modal" data-target="#mborrarp">Eliminar</button>';
               }else{
                   if ($data->estatus == 'Sin Definir')  {
                   $btn .= '<a href="javascript:void(0)" onclick="edituser('.$data->id_empleado.')"><button type="button" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#staticBackdrop">Definir Pedido</button></a>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="desactivaruser" id="'.$data->id_empleado.'" class="desactivaruser btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivaru">Desactivar</button>';
                   }
                   else{
                   $btn .= '<a href="javascript:void(0)" onclick="showpedido('.$data->id_empleado.')"><button type="button" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#detallepedido"><span class="ti-pencil-alt" title="Editar">Editar</span></button></a>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="desactivaruser" id="'.$data->id_empleado.'" class="desactivaruser btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivaru">Desactivar</button>';
                   }
               }

               return $btn;
           })

           ->rawColumns(['btn'])
           ->make(true);
} 


             $departamentos  = departamentos::orderBy('nombre_departamento')->get();
             return view ('empleado/index')
             ->with('departamentos',$departamentos);
             


    }


    public function pdfempleado(){

        //$pdfempleado = empleados::all();
        $pdfempleado = empleados::withTrashed()->join('departamentos','departamentos.id_departamento','=','empleados.id_departamento')
      ->select('empleados.nombre_empleado','empleados.apellido_pempleado','empleados.email_empleado','empleados.celular_empleado','empleados.id_empleado','departamentos.nombre_departamento')
      ->get();


        $pdf = \PDF::loadView('empleado.pdf',compact('pdfempleado'));
        return $pdf->download('pdf_empleado.pdf');
    }
    public function registerempleado()
    {
        $consulta = empleados::orderBy('id_empleado','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $estados          = estados::orderBy('nombre_estado')->get();
        $users            = User::orderBy('id')->get();
        $municipios       = municipios::orderBy('nombre_municipio')->get();
        $departamentos    = departamentos::orderBy('nombre_departamento')->get();
        $tipoempleados    = tipoempleados::orderBy('nombre_tipoempleado')->get();
        $consulta2  = empleados::withTrashed()->join('estados','empleados.id_estado','=','estados.id_estado')
                                                       ->join('users','empleados.id','=','users.id')
                                                       ->join('municipios','empleados.id_municipio','=','municipios.id_municipio')
                                                       ->join('tipoempleados','empleados.id_tipo_empleado','=','tipoempleados.id_tipo_empleado')
                                                       ->join('departamentos','empleados.id_departamento','=','departamentos.id_departamento')
                                                  ->select('empleados.id_infcliente','empleados.nombre_cliente','empleados.apellido_pcliente','empleados.apellido_mcliente',
                        'empleados.email_cliente','users.id','users.name','users.img','tipoempleados.nombre_tipoempleado','departamentos.nombre_departamento','municipios.nombre_municipio','estados.nombre_estado','empleados.celular_cliente','empleados.deleted_at');

        if ($cuantos == 0) {
            $id_sigue = 1; 
        }
        else{
            $id_sigue = $consulta[0]->id_empleado + 1;
        }

        //return $id_sigue;

        return view ('empleado/registerempleado')
        
            ->with('id_sigue',$id_sigue)
            ->with('estados',$estados)
            ->with('municipios',$municipios)
            ->with('users',$users)
            ->with('departamentos',$departamentos)
            ->with('tipoempleados',$tipoempleados)
            ->with('consulta2',$consulta2); 
            

        
    }


    public function desactivarempleado($id_empleado)
    {
        // Desactivacion
        $empleados = empleados::find($id_empleado);
        $empleados->delete();
        Session::flash('mensajed',"El empleado ha sido Desactivada correctamente");

        return redirect()->to('electronica_empleado');
    }
    public function activarempleado($id_empleado)
    {
        // Activacion
        empleados::withTrashed()->where('id_empleado',$id_empleado)->restore();
        
        Session::flash('mensaje',"El empleado ha sido Activada correctamente");

        return redirect()->to('electronica_empleado');
    }
    public function borrarempleado($id_empleado)
    {
        // Eliminacion


        $buscaempleado = productos::where('id_empleado',$id_empleado)->get();
        $cuantos = count($buscaempleado);
        if ($cuantos == 0) {
            $empleados = empleados::withTrashed()->find($id_empleado)->forceDelete();
            Session::flash('mensajedelete',"Informacion del empleado ha sido Eliminada correctamente");
            return redirect()->to('electronica_empleado');
                        
        }
        else{
            Session::flash('mensajed',"La empleado no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_empleado');
                        

        } 
        
    }
    
    public function guardarempleado(Request $request)
    {     
        
        $this->validate($request,[
            'nombre_empleado'        => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'apellido_pempleado'     => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'apellido_mempleado'     => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'celular_empleado'      => 'required|regex:/^[0-9]{10}$/',
            'email_empleado'         => 'required|email', 
            'calle_empleado'         => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            'codigo_postalempleado'  => 'required|regex:/^[0-9]{5}$/',
            'sexo_empleado'          => 'required',
            'id_tipo_empleado'          => 'required',
            'contratopdf'            => 'file|mimes:pdf',

        ]); 
 

        $file = $request->file('contratopdf');
        if ($file<>"") {
            $contratopdf  = $file->getClientOriginalName();
            $contratopdf2 = $request->id_empleado . $contratopdf;
            \Storage::disk('local')->put($contratopdf2, \File::get($file));
        }
        else{
            $contratopdf2 ="Sin contrato";
        }

 //dd($request);
 
      

        $empleado = new empleados;

         
        $empleado->nombre_empleado      = $request->input('nombre_empleado'); 
        $empleado->apellido_pempleado   = $request->input('apellido_pempleado'); 
        $empleado->apellido_mempleado   = $request->input('apellido_mempleado'); 
        $empleado->celular_empleado    = $request->input('celular_empleado'); 
        $empleado->email_empleado       = $request->input('email_empleado'); 
        $empleado->calle_empleado       = $request->input('calle_empleado'); 
        $empleado->codigo_postalempleado = $request->input('codigo_postalempleado'); 
        $empleado->sexo_empleado        = $request->input('sexo_empleado'); 
        $empleado->id_tipo_empleado     = $request->input('id_tipo_empleado'); 
       
        $empleado->id_departamento      = $request->input('id_departamento'); 
        $empleado->id_municipio         = $request->input('id_municipio'); 
        $empleado->id_estado            = $request->input('id_estado'); 
        $empleado->contratopdf          = $contratopdf2; 
        

           
        $empleado->save();

        Session::flash('mensaje',"El empleado  $request->nombre_empleado ha sido agregada correctamente");
        return redirect()->to('electronica_empleado');
        
 
       
    }

    public function editar_empleado($id_empleado)
    {
        
        

        $data = empleados::withTrashed()->join('estados','empleados.id_estado','=','estados.id_estado')
                                                  ->join('tipoempleados','empleados.id_tipo_empleado','=','tipoempleados.id_tipo_empleado')
                                                  ->join('departamentos','empleados.id_departamento','=','departamentos.id_departamento')
                                                  ->join('municipios','empleados.id_municipio','=','municipios.id_municipio')
                ->select('empleados.id_empleado','empleados.nombre_empleado','empleados.apellido_pempleado','empleados.apellido_mempleado',
                         'empleados.celular_empleado',
                         'empleados.codigo_postalempleado','empleados.email_empleado','empleados.sexo_empleado','empleados.calle_empleado','empleados.contratopdf',
                         'estados.nombre_estado as est','estados.id_estado','tipoempleados.nombre_tipoempleado as temple','tipoempleados.id_tipo_empleado',
                         'municipios.nombre_municipio as muni','municipios.id_municipio','departamentos.nombre_departamento as depa','departamentos.id_departamento')
                ->where('id_empleado',$id_empleado)
                ->get();

        $estados    = estados::all();
        $municipios = municipios::all();
        $tipoempleados       = tipoempleados::all();
        $departamentos      = departamentos::all();




       

        return view ('empleado.edit')
               ->with('data',$data[0])
               ->with('estados',$estados)
               ->with('municipios',$municipios) 
               ->with('tipoempleados',$tipoempleados)
               ->with('departamentos',$departamentos) ; 

        
    }

    

    public function updateempleado(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[
            'id_empleado'     => 'required',
            'nombre_empleado'        => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'apellido_pempleado'     => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'apellido_mempleado'     => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'celular_empleado'      => 'required|regex:/^[0-9]{10}$/',
            'email_empleado'         => 'required|email', 
            'calle_empleado'         => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            'codigo_postalempleado'  => 'required|regex:/^[0-9]{5}$/',
            'sexo_empleado'          => 'required',
            'contratopdf'            => 'file|mimes:pdf',
           
            
        ]); 

        $file = $request->file('contratopdf');
        if ($file<>"") {
            $contratopdf  = $file->getClientOriginalName();
            $contratopdf2 = $request->id_empleado . $contratopdf;
            \Storage::disk('local')->put($contratopdf2, \File::get($file));
        }



        $data = empleados::withTrashed()->find($request->id_empleado);

        $data->id_empleado          = $request->id_empleado; 
        $data->nombre_empleado      = $request->nombre_empleado; 
        $data->apellido_pempleado   = $request->apellido_pempleado; 
        $data->apellido_mempleado   = $request->apellido_mempleado; 
        $data->celular_empleado    = $request->celular_empleado; 
        $data->email_empleado       = $request->email_empleado; 
        $data->calle_empleado       = $request->calle_empleado; 
        $data->codigo_postalempleado = $request->codigo_postalempleado; 
        $data->sexo_empleado        = $request->sexo_empleado; 
        $data->id_tipo_empleado     = $request->id_tipo_empleado; 
        $data->id                   = $request->id; 
        $data->id_departamento      = $request->id_departamento; 
        $data->id_municipio         = $request->id_municipio; 
        $data->id_estado            = $request->id_estado; 
        if ($file<>"") {
            $data->contratopdf = $contratopdf2;
        }
        $data->save();

        Session::flash('mensaje',"El empleado $request->nombre_empleado ha sido Actualizada correctamente");
        return redirect()->to('electronica_empleado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

 
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */












    /*Public*/
    /*
     public function download_public(Request $request)
    {
        if (Storage::disk('public')->exists('archivos/$request->file')) {
            $path = Storage::disk('public')->path('archivos/$request->file');
            $content=file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type'=>mime_content_type($path)
            ]);
            return redirect(404);
        }
    }*/



 




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
