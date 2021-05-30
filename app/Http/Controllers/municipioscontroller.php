<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\informacionclientes;
use App\Models\municipios;
use DataTables;
use Session; 

class municipioscontroller extends Controller
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
        $consulta = municipios::orderBy('id_municipio','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = municipios::withTrashed()->select(['id_municipio','nombre_municipio','deleted_at'])
                                       ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_municipio + 1;
        }

        //return $id_sigue;

        return view ('municipio/index')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);
    }

    public function desactivarmunicipio($id_municipio)
    {
        // Desactivacion
        $municipios = municipios::find($id_municipio);
        $municipios->delete();
        Session::flash('mensajed',"El municipio ha sido Desactivado correctamente");

        return redirect()->to('electronica_municipio');
    }
    public function activarmunicipio($id_municipio)
    {
        // Activacion
        municipios::withTrashed()->where('id_municipio',$id_municipio)->restore();
        
        Session::flash('mensaje',"El municipio ha sido Activado correctamente");

        return redirect()->to('electronica_municipio');
    }
    public function borrarmunicipio($id_municipio)
    {
        // Eliminacion


        $buscamun = informacionclientes::where('id_municipio',$id_municipio)->get();
        
        $cuantos = count($buscamun);
        if ($cuantos == 0) {
            $municipios = municipios::withTrashed()->find($id_municipio)->forceDelete();
            Session::flash('mensajedelete',"Informacion del municipio ha sido Eliminada correctamente");
            return redirect()->to('electronica_municipio');
                        
        }
        else{
            Session::flash('mensajed',"El municipio no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_municipio');
                        

        }
        
    }
   
    public function guardarmunicipio(Request $request)
    {     
        
        $this->validate($request,[
            'nombre_municipio' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
        ]);

        $municipio = new municipios;

         
        $municipio->id_municipio           = $request->input('id_municipio'); 
        $municipio->nombre_municipio       = $request->input('nombre_municipio'); 
        

           
        $municipio->save();

        Session::flash('mensaje',"El municipio  $request->nombre_municipio ha sido agregado correctamente");
        return redirect()->to('electronica_municipio');
 
       
    }

    public function editar_municipio($id_municipio)
    {
        $datamuni = municipios::withTrashed()->find($id_municipio);
        return view ('municipio.editmunicipio',['datamuni'=>$datamuni]); 

        
    }

    

    public function updatemunicipio(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[
            'id_municipio'          => 'required',
            'nombre_municipio' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $datamuni = municipios::withTrashed()->find($request->id_municipio);

       
        
        $datamuni->nombre_municipio =  $request->nombre_municipio;
        $datamuni->save();

        Session::flash('mensaje',"El municipio $request->nombre_municipio ha sido Actualizado correctamente");
        return redirect()->to('electronica_municipio');
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
