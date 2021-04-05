<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\metodopagos;
use Session;

class metodopagoscontroller extends Controller
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

 
    public function desactivarmetodopago($id_metodo_pago)
    {
        // Desactivacion
        $metodopagos = metodopagos::find($id_metodo_pago);
        $metodopagos->delete();

        Session::flash('mensajed',"El Metodo de pago ha sido descativado correctamente");
        return redirect()->to('electronica_metodopago');
    }
    public function activarmetodopago($id_metodo_pago)
    {
        // Activacion
        metodopagos::withTrashed()->where('id_metodo_pago',$id_metodo_pago)->restore();
        
        Session::flash('mensaje',"El Metodo de pago ha sido Activado correctamente");
        return redirect()->to('electronica_metodopago');
    }
    public function borrarmetodopago($id_metodo_pago)
    {
        // Eliminacion
        $metodopagos = metodopagos::withTrashed()->find($id_metodo_pago)->forceDelete();

        Session::flash('mensajedelete',"El Metodo de pago ha sido Eliminad correctamente");
        return redirect()->to('electronica_metodopago');
    }




    public function index()
    {
        $consulta = metodopagos::orderBy('id_metodo_pago','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);
 
        $consulta2 = metodopagos::withTrashed()->select(['id_metodo_pago','metodo_pago','deleted_at'])
                                       ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{ 
            $id_sigue = $consulta[0]->id_metodo_pago + 1;
        }

        //return $id_sigue;
 
        return view ('metodopago/metodopago')
            ->with('id_sigue',$id_sigue)
            ->with('consulta2',$consulta2);

    }



    public function guardarmetodopago (Request $request)
    {     
        
        $this->validate($request,[
            'metodo_pago' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
        ]);

        $metodopago = new metodopagos;

         
        $metodopago->id_metodo_pago    = $request->input('id_metodo_pago'); 
        $metodopago->metodo_pago       = $request->input('metodo_pago'); 
        

            
        $metodopago->save();

        Session::flash('mensaje',"El metodo de pago $request->metodo_pago se agrego correctamente");
        return redirect()->to('electronica_metodopago');

       
    }

    public function editar_mpago($id_metodo_pago)
    {
        $data = metodopagos::withTrashed()->find($id_metodo_pago);
        return view ('metodopago.editmpago',['data'=>$data]); 

        
    }

    public function updatempago(Request $request)
    {

    //return $request->input();

        $this->validate($request,[
            'id_metodo_pago' => 'required',
            'metodo_pago' => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
           
            
        ]);

        $data = metodopagos::withTrashed()->find($request->id_metodo_pago);

       
        $data->metodo_pago =  $request->metodo_pago;
        $data->save();

        Session::flash('mensaje',"El metodo de pago $request->metodo_pago se Actualizo correctamente");
        return redirect()->to('electronica_metodopago');
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
