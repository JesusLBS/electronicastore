<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\informacionclientes;
use App\Models\estados;
use DataTables;
use Session;

class estadoscontroller extends Controller
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
    
    public function desactivarestado($id_estado)
    {
        // Desactivacion
        $estados = estados::find($id_estado);
        $estados->delete();
        Session::flash('mensajed',"El Estado ha sido Desactivado correctamente");

        return redirect()->to('electronica_estado');
    }
    public function activarestado($id_estado)
    {
        // Activacion
        estados::withTrashed()->where('id_estado',$id_estado)->restore();
        
        Session::flash('mensaje',"Estado  ha sido Activado correctamente");

        return redirect()->to('electronica_estado');
    }
    public function borrarestado($id_estado)
    {
        // Eliminacion


        $buscaestado = informacionclientes::where('id_estado',$id_estado)->get();
        $cuantos = count($buscaestado);
        if ($cuantos == 0) {
            $estados = estados::withTrashed()->find($id_estado)->forceDelete();
            Session::flash('mensajedelete',"Informacion del Estado Eliminada correctamente");
            return redirect()->to('electronica_estado');
                        
        }
        else{
            Session::flash('mensajed',"El Estado no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_estado');
                        

        }
        
    }


    public function index()
    {
        $consulta = estados::orderBy('id_estado','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = estados::withTrashed()->select(['id_estado','nombre_estado','deleted_at'])
                                       ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_estado + 1;
        }

        //return $id_sigue;

        return view ('estado/estado')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);
    }

   
    public function guardarestado(Request $request)
    {     
        
        $this->validate($request,[
            'nombre_estado' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $estado = new estados;

         
        $estado->id_estado        = $request->input('id_estado'); 
        $estado->nombre_estado       = $request->input('nombre_estado'); 
        

           
        $estado->save();

        Session::flash('mensaje',"Estado $request->nombre_estado ha sido agregado correctamente");
        return redirect()->to('electronica_estado');
 
       
    }

    public function editar_estado($id_estado)
    {
        $dataest = estados::withTrashed()->find($id_estado);
        return view ('estado.editestado',['dataest'=>$dataest]); 

        
    }

    

    /*public function updateestado(Request $request,$id_estado)
    {
         


        $estados = estados::find($id_estado);

       
        $estados->nombre_estado =  $request->nombre_estado;
        $estados->save();

        
        return redirect()->to('electronica_estado');
    }*/

    public function updateestado(Request $request)
    {

    //return $request->input();

        $this->validate($request,[
            'id_estado' => 'required',
            'nombre_estado' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $dataest = estados::withTrashed()->find($request->id_estado);

       
        $dataest->nombre_estado =  $request->nombre_estado;
        $dataest->save();

        Session::flash('mensaje',"Estado $request->nombre_estado ha sido Actualizado correctamente");
        return redirect()->to('electronica_estado');
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
