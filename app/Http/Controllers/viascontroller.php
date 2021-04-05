<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\informacionclientes;
use App\Models\vias;

use Session;

class viascontroller extends Controller
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
        $consulta = vias::orderBy('id_via','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = vias::withTrashed()->select(['id_via','tipo_via','descripcion_via','deleted_at'])
                                       ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_via + 1;
        }

        //return $id_sigue;

        return view ('via/index')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);
    }

    public function desactivarvia($id_via)
    {
        // Desactivacion
        $vias = vias::find($id_via);
        $vias->delete();
        Session::flash('mensajed',"El tipo de via ha sido Desactivado correctamente");

        return redirect()->to('electronica_via');
    }
    public function activarvia($id_via)
    {
        // Activacion
        vias::withTrashed()->where('id_via',$id_via)->restore();
        
        Session::flash('mensaje',"El tipo de via ha sido Activado correctamente");

        return redirect()->to('electronica_via');
    }
    public function borrarvia($id_via)
    {
        // Eliminacion


        $buscavia = informacionclientes::where('id_via',$id_via)->get();
        $cuantos = count($buscavia);
        if ($cuantos == 0) {
            $vias = vias::withTrashed()->find($id_via)->forceDelete();
            Session::flash('mensajedelete',"Informacion del tipo de via Eliminada correctamente");
            return redirect()->to('electronica_via');
                        
        }
        else{
            Session::flash('mensajed',"El tipo de via no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_via');
                        

        }
        
    }
   
    public function guardarvia(Request $request)
    {     
        
        $this->validate($request,[
            'tipo_via'        => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'descripcion_via' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $via = new vias;

         
        $via->id_via                = $request->input('id_via'); 
        $via->tipo_via              = $request->input('tipo_via'); 
        $via->descripcion_via       = $request->input('descripcion_via'); 
        

           
        $via->save();

        Session::flash('mensaje',"El tipo de via $request->tipo_via ha sido agregada correctamente");
        return redirect()->to('electronica_via');
 
       
    }

    public function editar_via($id_via)
    {
        $datavia = vias::withTrashed()->find($id_via);
        return view ('via.editvia',['datavia'=>$datavia]); 

        
    }

    

    public function updatevia(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[
            'id_via'          => 'required',
            'tipo_via'        => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'descripcion_via' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $datavia = vias::withTrashed()->find($request->id_via);

       
        $datavia->tipo_via        =  $request->tipo_via;
        $datavia->descripcion_via =  $request->descripcion_via;
        $datavia->save();

        Session::flash('mensaje',"El tipo de via $request->tipo_via ha sido Actualizado correctamente");
        return redirect()->to('electronica_via');
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
