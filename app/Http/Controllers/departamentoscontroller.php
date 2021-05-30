<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departamentos;
use App\Models\empleados;
use DataTables;
use Session;
use PDF;

class departamentoscontroller extends Controller
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
        $consulta = departamentos::orderBy('id_departamento','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = departamentos::withTrashed()->select(['id_departamento','nombre_departamento','deleted_at'])
                                       ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_departamento + 1;
        }

        //return $id_sigue;

        return view ('departamento/index')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);*/
        if ($request->ajax()) {

            $data = departamentos::withTrashed()->select(['id_departamento','nombre_departamento'])
                                       ->get();

       return DataTables::of($data)
               ->addIndexColumn()
               ->addColumn('btn',function($data){
                $btn = '&nbsp;';

                if ($data->deleted_at) {
                   $btn .= '<button type="button" name="activauser"  id="'.$data->id_departamento.'" class="activauser btn btn-success  btn-sm" data-toggle="modal" data-target="#mactivarp">Activar</button>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="eliminaruser"  id="'.$data->id_departamento.'" class="eliminaruser btn btn-danger  btn-sm" data-toggle="modal" data-target="#mborrarp">Eliminar</button>';
                }else{
                   if ($data->estatus == 'Sin Definir')  {
                   $btn .= '<a href="javascript:void(0)" onclick="edituser('.$data->id_departamento.')"><button type="button" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#staticBackdrop">Definir Pedido</button></a>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="desactivaruser" id="'.$data->id_departamento.'" class="desactivaruser btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivaru">Desactivar</button>';
                   }
                   else{
                   $btn .= '<a href="javascript:void(0)" onclick="showpedido('.$data->id_departamento.')"><button type="button" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#detallepedido"><span class="ti-pencil-alt" title="Editar">Editar</span></button></a>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="desactivaruser" id="'.$data->id_departamento.'" class="desactivaruser btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivaru">Desactivar</button>';
                   }
                }

               return $btn;
           })
           ->rawColumns(['btn'])
           ->make(true);
       }


        $consulta = departamentos::orderBy('id_departamento','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_departamento + 1;
        }


        return view ('departamento/index')
            ->with('id_sigue',$id_sigue);      
    }



    public function desactivardepartamento($id_departamento)
    {
        // Desactivacion
        $departamentos = departamentos::find($id_departamento);
        $departamentos->delete();
        Session::flash('mensajed',"La departamento ha sido Desactivada correctamente");

        return redirect()->to('electronica_departamento');
    }
    public function activardepartamento($id_departamento)
    {
        // Activacion
        departamentos::withTrashed()->where('id_departamento',$id_departamento)->restore();
        
        Session::flash('mensaje',"La departamento ha sido Activada correctamente");

        return redirect()->to('electronica_departamento');
    }
    public function borrardepartamento($id_departamento)
    {
        // Eliminacion


        $buscamun = empleados::where('id_departamento',$id_departamento)->get();
        $cuantos = count($buscamun);
        if ($cuantos == 0) {
            $departamentos = departamentos::withTrashed()->find($id_departamento)->forceDelete();
            Session::flash('mensajedelete',"Informacion de la departamento ha sido Eliminada correctamente");
            return redirect()->to('electronica_departamento');
                        
        }
        else{
            Session::flash('mensajed',"La departamento no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_departamento');
                        

        }
        
    }
   
    public function guardardepartamento(Request $request)
    {     
        
        $this->validate($request,[
            'nombre_departamento' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
        ]);

        $departamento = new departamentos;

         
        $departamento->id_departamento           = $request->input('id_departamento'); 
        $departamento->nombre_departamento       = $request->input('nombre_departamento'); 
        

           
        $departamento->save();

        Session::flash('mensaje',"La departamento  $request->nombre_departamento ha sido agregada correctamente");
        return redirect()->to('electronica_departamento');
 
       
    }

    public function editar_departamento($id_departamento)
    {
        $datadepartamento = departamentos::withTrashed()->find($id_departamento);
        return view ('departamento.editdepartamento',['datadepartamento'=>$datadepartamento]); 
    }

    public function updatedepartamento(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[
            'id_departamento'     => 'required',
            'nombre_departamento' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
        ]); 

        $datadepartamento = departamentos::withTrashed()->find($request->id_departamento);

        $datadepartamento->nombre_departamento =  $request->nombre_departamento;
        $datadepartamento->save();

        Session::flash('mensaje',"La departamento $request->nombre_departamento ha sido Actualizada correctamente");
        return redirect()->to('electronica_departamento');
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
