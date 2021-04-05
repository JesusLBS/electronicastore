<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marcas;
use App\Models\productos;
use Session;  

class marcascontroller extends Controller
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
        $consulta = marcas::orderBy('id_marca','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = marcas::withTrashed()->select(['id_marca','nombre_marca','deleted_at'])
                                       ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_marca + 1;
        }

        //return $id_sigue;

        return view ('marca/index')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);
    }

    public function desactivarmarca($id_marca)
    {
        // Desactivacion
        $marcas = marcas::find($id_marca);
        $marcas->delete();
        Session::flash('mensajed',"La marca ha sido Desactivada correctamente");

        return redirect()->to('electronica_marca');
    }
    public function activarmarca($id_marca)
    {
        // Activacion
        marcas::withTrashed()->where('id_marca',$id_marca)->restore();
        
        Session::flash('mensaje',"La marca ha sido Activada correctamente");

        return redirect()->to('electronica_marca');
    }
    public function borrarmarca($id_marca)
    {
        // Eliminacion


        $buscamarca = productos::where('id_marca',$id_marca)->get();
        $cuantos = count($buscamarca);
        if ($cuantos == 0) {
            $marcas = marcas::withTrashed()->find($id_marca)->forceDelete();
            Session::flash('mensajedelete',"Informacion de la marca ha sido Eliminada correctamente");
            return redirect()->to('electronica_marca');
                        
        }
        else{
            Session::flash('mensajed',"La marca no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_marca');
                        

        }
        
    }
   
    public function guardarmarca(Request $request)
    {     
        
        $this->validate($request,[
            'nombre_marca' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
        ]);

        $marca = new marcas;

         
        $marca->id_marca           = $request->input('id_marca'); 
        $marca->nombre_marca       = $request->input('nombre_marca'); 
        

           
        $marca->save();

        Session::flash('mensaje',"La marca  $request->nombre_marca ha sido agregada correctamente");
        return redirect()->to('electronica_marca');
 
       
    }

    public function editar_marca($id_marca)
    {
        $datamarca = marcas::withTrashed()->find($id_marca);
        return view ('marca.editmarca',['datamarca'=>$datamarca]); 

        
    }

    

    public function updatemarca(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[
            'id_marca'     => 'required',
            'nombre_marca' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $datamarca = marcas::withTrashed()->find($request->id_marca);

       
        
        $datamarca->nombre_marca =  $request->nombre_marca;
        $datamarca->save();

        Session::flash('mensaje',"La marca $request->nombre_marca ha sido Actualizada correctamente");
        return redirect()->to('electronica_marca');
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
