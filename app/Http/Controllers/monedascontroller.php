<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\monedas;
use Session;

class monedascontroller extends Controller
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
    
    public function desactivarmoneda($id_moneda)
    {
        // Desactivacion
        $monedas = monedas::find($id_moneda);
        $monedas->delete();
        Session::flash('mensaje',"Moneda ha sido descativada correctamente");  
        return redirect()->to('electronica_moneda');
    }
    public function activarmoneda($id_moneda)
    {
        // Activacion
        monedas::withTrashed()->where('id_moneda',$id_moneda)->restore();
        
        Session::flash('mensaje',"Forma de pago ha sido Activada correctamente");

        return redirect()->to('electronica_moneda');
    }
    public function borrarmoneda($id_moneda)
    {
        // Eliminacion
        $monedas = monedas::withTrashed()->find($id_moneda)->forceDelete();

        Session::flash('mensajedelete',"Informacion de moneda ha sido Eliminada correctamente");

        return redirect()->to('electronica_moneda');
    }

    public function index()
    {
        $consulta = monedas::orderBy('id_moneda','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = monedas::withTrashed()->select(['id_moneda','tipo_moneda','deleted_at'])
                                       ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_moneda + 1;
        }
 
        //return $id_sigue;
 
        return view ('moneda/moneda')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);
    }

    public function guardarmoneda(Request $request)
    {     
        
        $this->validate($request,[
            'tipo_moneda' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $moneda = new monedas;

         
        $moneda->id_moneda        = $request->input('id_moneda'); 
        $moneda->tipo_moneda       = $request->input('tipo_moneda'); 
        

           
        $moneda->save(); 

        Session::flash('mensaje',"Moneda  $request->tipo_moneda ha sido Agregada correctamente");
        return redirect()->to('electronica_moneda');

       
    }


    public function editar_moneda($id_moneda)
    {
        $data = monedas::withTrashed()->find($id_moneda);
        return view ('moneda.editmoneda',['data'=>$data]); 

        
    }

    public function updatemoneda(Request $request)
    {

    //return $request->input();

        $this->validate($request,[
            'id_moneda' => 'required',
            'tipo_moneda' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $data = monedas::withTrashed()->find($request->id_moneda);

       
        $data->tipo_moneda =  $request->tipo_moneda;
        $data->save();

        Session::flash('mensaje',"Moneda  $request->tipo_moneda ha sido Actualizada correctamente");
        return redirect()->to('electronica_moneda');
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
