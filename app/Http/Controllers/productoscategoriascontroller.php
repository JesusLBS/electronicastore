<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Models\productcategorias;
use App\Models\productos;
use Session;

class productoscategoriascontroller extends Controller
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
        $consulta = productcategorias::orderBy('id_pcategoria','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = productcategorias::withTrashed()->select(['id_pcategoria','nombre_pcategoria','descripcion_pcategoria','deleted_at'])
                                       ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_pcategoria + 1;
        }

        //return $id_sigue;

        return view ('productoscategoria/index')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);*/

       

        if ($request->ajax()) {
 

            $data = productcategorias::withTrashed()->select(['id_pcategoria','nombre_pcategoria','descripcion_pcategoria'])
                                       ->get();

           return DataTables::of($data)
                   ->addIndexColumn()
                   ->addColumn('btn',function($data){

               $btn = '&nbsp;';

               if ($data->deleted_at) {
                   $btn .= '<button type="button" name="activauser"  id="'.$data->id_pcategoria.'" class="activauser btn btn-success  btn-sm" data-toggle="modal" data-target="#mactivarp">Activar</button>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="eliminaruser"  id="'.$data->id_pcategoria.'" class="eliminaruser btn btn-danger  btn-sm" data-toggle="modal" data-target="#mborrarp">Eliminar</button>';
               }else{
                   if ($data->estatus == 'Sin Definir')  {
                   $btn .= '<a href="javascript:void(0)" onclick="edituser('.$data->id_pcategoria.')"><button type="button" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#staticBackdrop">Definir Pedido</button></a>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="desactivaruser" id="'.$data->id_pcategoria.'" class="desactivaruser btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivaru">Desactivar</button>';
                   }
                   else{
                   $btn .= '<a href="javascript:void(0)" onclick="showpedido('.$data->id_pcategoria.')"><button type="button" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#detallepedido"><span class="ti-pencil-alt" title="Editar">Editar</span></button></a>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="desactivaruser" id="'.$data->id_pcategoria.'" class="desactivaruser btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivaru">Desactivar</button>';
                   }
               }

               return $btn;
           })
           ->rawColumns(['btn'])
           ->make(true);
        }




        $consulta = productcategorias::orderBy('id_pcategoria','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);


        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_pcategoria + 1;
        }


        return view ('productoscategoria/index')
            ->with('id_sigue',$id_sigue);
    }

    public function desactivarpcategoria($id_pcategoria)
    {
        // Desactivacion
        $productcategorias = productcategorias::find($id_pcategoria);
        $productcategorias->delete();
        Session::flash('mensajed',"La categoria ha sido Desactivada correctamente");

        return redirect()->to('electronica_pcategoria');
    }
    public function activarpcategoria($id_pcategoria)
    {
        // Activacion
        productcategorias::withTrashed()->where('id_pcategoria',$id_pcategoria)->restore();
        
        Session::flash('mensaje',"La categoria ha sido Activada correctamente");

        return redirect()->to('electronica_pcategoria');
    }
    public function borrarpcategoria($id_pcategoria)
    {
        // Eliminacion


        $buscamun = productos::where('id_pcategoria',$id_pcategoria)->get();
        $cuantos = count($buscamun);
        if ($cuantos == 0) {
            $productcategorias = productcategorias::withTrashed()->find($id_pcategoria)->forceDelete();
            Session::flash('mensajedelete',"Informacion de la categoria ha sido Eliminada correctamente");
            return redirect()->to('electronica_pcategoria');
                        
        }
        else{
            Session::flash('mensajed',"La categoria no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_pcategoria');
                        

        }
        
    }
   
    public function guardarpcategoria(Request $request)
    {     
        
        $this->validate($request,[
            'nombre_pcategoria'      => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'descripcion_pcategoria' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',

        ]);

        $pcategoria = new productcategorias;

         
        $pcategoria->id_pcategoria           = $request->input('id_pcategoria'); 
        $pcategoria->nombre_pcategoria       = $request->input('nombre_pcategoria'); 
        $pcategoria->descripcion_pcategoria  = $request->input('descripcion_pcategoria'); 
        

           
        $pcategoria->save();

        Session::flash('mensaje',"La categoria  $request->nombre_pcategoria ha sido agregada correctamente");
        return redirect()->to('electronica_pcategoria');
 
       
    }

    public function editar_pcategoria($id_pcategoria)
    {
        $datapcatego = productcategorias::withTrashed()->find($id_pcategoria);
        return view ('productoscategoria.editpcategoria',['datapcatego'=>$datapcatego]); 

        
    }

    

    public function updatepcategoria(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[
            'id_pcategoria'          => 'required',
            'nombre_pcategoria' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'descripcion_pcategoria' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            
        ]);

        $datapcatego = productcategorias::withTrashed()->find($request->id_pcategoria);
        
        $datapcatego->nombre_pcategoria        =  $request->nombre_pcategoria;
        $datapcatego->descripcion_pcategoria        =  $request->descripcion_pcategoria;


        $datapcatego->save();

        Session::flash('mensaje',"La categoria $request->nombre_pcategoria ha sido Actualizada correctamente");
        return redirect()->to('electronica_pcategoria');
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
