<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\razonsocials;
use App\Models\proveedores;
use Session;

class razonsocialcontroller extends Controller
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
        $consulta = razonsocials::orderBy('id_razonsocial','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = razonsocials::withTrashed()->select(['id_razonsocial','tipo_razonsocial','deleted_at'])
                                       ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_razonsocial + 1;
        }
 
        //return $id_sigue;

        return view ('razonsocial/index')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);
    }
 
    public function desactivarrazons($id_razonsocial)
    {
        // Desactivacion
        $razonsocials = razonsocials::find($id_razonsocial);
        $razonsocials->delete();
        Session::flash('mensajed',"La razons ha sido Desactivada correctamente");

        return redirect()->to('electronica_razons');
    }
    public function activarrazons($id_razonsocial)
    {
        // Activacion
        razonsocials::withTrashed()->where('id_razonsocial',$id_razonsocial)->restore();
        
        Session::flash('mensaje',"La razons ha sido Activada correctamente");

        return redirect()->to('electronica_razons');
    }
    public function borrarrazons($id_razonsocial)
    {
        // Eliminacion


        $buscarazons = proveedores::where('id_razonsocial',$id_razonsocial)->get();
        $cuantos = count($buscarazons);
        if ($cuantos == 0) {
            $razonsocials = razonsocials::withTrashed()->find($id_razonsocial)->forceDelete();
            Session::flash('mensajedelete',"Informacion de la razons ha sido Eliminada correctamente");
            return redirect()->to('electronica_razons');
                        
        }
        else{
            Session::flash('mensajed',"La razons no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_razons');
                        

        }
        
    }
   
    public function guardarrazons(Request $request)
    {     
        
        $this->validate($request,[
            'tipo_razonsocial' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,.]+$/',
        ]);

        $razons = new razonsocials;

         
        $razons->id_razonsocial           = $request->input('id_razonsocial'); 
        $razons->tipo_razonsocial       = $request->input('tipo_razonsocial'); 
        

           
        $razons->save();

        Session::flash('mensaje',"La razons  $request->tipo_razonsocial ha sido agregada correctamente");
        return redirect()->to('electronica_razons');
 
       
    }

    public function editar_razons($id_razonsocial)
    {
        $datarazons = razonsocials::withTrashed()->find($id_razonsocial);
        return view ('razonsocial.edit',['datarazons'=>$datarazons]); 

        
    }

    

    public function updaterazons(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[
            'id_razonsocial'     => 'required',
            'tipo_razonsocial' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $datarazons = razonsocials::withTrashed()->find($request->id_razonsocial);

       
        
        $datarazons->tipo_razonsocial =  $request->tipo_razonsocial;
        $datarazons->save();

        Session::flash('mensaje',"La razons $request->tipo_razonsocial ha sido Actualizada correctamente");
        return redirect()->to('electronica_razons');
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
