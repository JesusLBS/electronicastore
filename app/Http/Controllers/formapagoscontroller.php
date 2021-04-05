<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formapagos;
use Session;

class formapagoscontroller extends Controller
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
    
    public function desactivarformpago($id_forma_pago)
    {
        // Desactivacion
        $formapagos = formapagos::find($id_forma_pago);
        $formapagos->delete();

        Session::flash('mensajed',"Forma de pago ha sido descativada correctamente");
        return redirect()->to('electronica_formapago');
    }
    public function activarformpago($id_forma_pago)
    {
        // Activacion
        formapagos::withTrashed()->where('id_forma_pago',$id_forma_pago)->restore();
        
        Session::flash('mensaje',"Forma de pago ha sido Activada correctamente");
        return redirect()->to('electronica_formapago');
    }
    public function borrarformpago($id_forma_pago)
    {
        // Eliminacion
        $formapagos = formapagos::withTrashed()->find($id_forma_pago)->forceDelete();

        Session::flash('mensajedelete',"Forma de pago ha sido Eliminada correctamente");
        return redirect()->to('electronica_formapago');
    }
/*-----------------------------------------------------------Start Formapago----------------------------------------------*/
    public function index()
    {
        $consulta = formapagos::orderBy('id_forma_pago','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = formapagos::withTrashed()->select(['id_forma_pago','forma_pago','deleted_at'])
                                       ->get();
    

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{ 
            $id_sigue = $consulta[0]->id_forma_pago + 1;
        }

        //return $id_sigue;
 
        return view ('formapago/formapago')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);

    }



    public function guardarformapago (Request $request)
    {     
        
        $this->validate($request,[
            'forma_pago' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
        ]);

        $moneda = new formapagos;

         
        $moneda->id_forma_pago    = $request->input('id_forma_pago'); 
        $moneda->forma_pago       = $request->input('forma_pago'); 
        

           
        $moneda->save();

        Session::flash('mensaje',"Forma de pago $request->forma_pago ha sido Agregada correctamente");
        return redirect()->to('electronica_formapago');

       
    }
/*-----------------------------------------------------------End Formapago----------------------------------------------*/

    public function editar_formpago($id_forma_pago)
    {
        $data = formapagos::withTrashed()->find($id_forma_pago);
        return view ('formapago.editformpago',['data'=>$data]); 

        
    }

    public function updateformpago(Request $request)
    {

    //return $request->input();

        $this->validate($request,[
            'id_forma_pago' => 'required',
            'forma_pago' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $data = formapagos::withTrashed()->find($request->id_forma_pago);

       
        $data->forma_pago =  $request->forma_pago;
        $data->save();

        Session::flash('mensaje',"Forma de pago $request->forma_pago ha sido modificada correctamente");
        return redirect()->to('electronica_formapago');
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
