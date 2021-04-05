<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proveedores; 
use App\Models\marcas; 
use App\Models\productcategorias; 
use App\Models\productos; 
use App\Models\departamentos;  
use App\Models\razonsocials;  
use Session;

class proveedorescontroller extends Controller
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
        
         
        $consulta2      = proveedores::withTrashed()->select('proveedores.id_proveedor','proveedores.celular_proveedor'
                                                        ,'proveedores.email_proveedor','proveedores.nombre_proveedor','proveedores.deleted_at')
                                       ->get();

        //return $id_sigue;
        return view ('proveedor/index')
             ->with('consulta2',$consulta2);
    }
    
    public function registerproveedor() 
    {
       
        $consulta = proveedores::orderBy('id_proveedor','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $razonsocials          = razonsocials::orderBy('tipo_razonsocial')->get();
        
        $consulta2        = proveedores::withTrashed()->join('razonsocials','proveedores.id_razonsocial','=','razonsocials.id_razonsocial')
                                                  ->select('proveedores.id_proveedor','proveedores.nombre_proveedor','proveedores.rfc_proveedor','proveedores.celular_proveedor',
                        'proveedores.email_proveedor','razonsocials.tipo_razonsocial','proveedores.tipopersona_proveedor','proveedores.deleted_at');

        if ($cuantos == 0) {
            $id_sigue = 1; 
        }
        else{
            $id_sigue = $consulta[0]->id_proveedor + 1;
        }

        //return $id_sigue;

        return view ('proveedor/registerproveedor')
        
            ->with('id_sigue',$id_sigue)
            ->with('razonsocials',$razonsocials)
            
            ->with('consulta2',$consulta2); 
            

        
    }


    public function desactivarproveedor($id_proveedor)
    {
        // Desactivacion
        $proveedores = proveedores::find($id_proveedor);
        $proveedores->delete();
        Session::flash('mensajed',"El proveedor ha sido Desactivada correctamente");

        return redirect()->to('electronica_proveedor');
    }
    public function activarproveedor($id_proveedor)
    {
        // Activacion
        proveedores::withTrashed()->where('id_proveedor',$id_proveedor)->restore();
        
        Session::flash('mensaje',"El proveedor ha sido Activada correctamente");

        return redirect()->to('electronica_proveedor');
    }
    public function borrarproveedor($id_proveedor)
    {
        // Eliminacion


        $buscaproveedor = productos::where('id_proveedor',$id_proveedor)->get();
        $cuantos = count($buscaproveedor);
        if ($cuantos == 0) {
            $proveedores = proveedores::withTrashed()->find($id_proveedor)->forceDelete();
            Session::flash('mensajedelete',"Informacion del proveedor ha sido Eliminada correctamente");
            return redirect()->to('electronica_proveedor');
                        
        }
        else{
            Session::flash('mensajed',"La proveedor no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_proveedor');
                        

        } 
        
    }
    
    public function guardarproveedor(Request $request)
    {     
                /*
id_proveedor 
nombre_proveedor
rfc_proveedor
celular_proveedor
email_proveedor
tipopersona_proveedor
id_razonsocial
*/
        $this->validate($request,[
            'nombre_proveedor'       => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'rfc_proveedor'          => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            
            'celular_proveedor'     => 'required|regex:/^[0-9]{10}$/',
            'email_proveedor'        => 'required|email', 
            'tipopersona_proveedor'  => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            'id_razonsocial'         => 'required',

        ]); 
 
 //dd($request);
 
      

        $proveedor = new proveedores;

         
        $proveedor->nombre_proveedor      = $request->input('nombre_proveedor'); 
        $proveedor->rfc_proveedor         = $request->input('rfc_proveedor'); 
        
        $proveedor->celular_proveedor    = $request->input('celular_proveedor'); 
        $proveedor->email_proveedor       = $request->input('email_proveedor'); 
        $proveedor->tipopersona_proveedor = $request->input('tipopersona_proveedor'); 
        $proveedor->id_razonsocial        = $request->input('id_razonsocial'); 
              

           
        $proveedor->save();

        Session::flash('mensaje',"El proveedor  $request->nombre_proveedor ha sido agregado correctamente");
        return redirect()->to('electronica_proveedor');
        
 
        
    }

    public function editar_proveedor($id_proveedor)
    {
        

        $data        = proveedores::withTrashed()->join('razonsocials','proveedores.id_razonsocial','=','razonsocials.id_razonsocial')
                                                  ->select('proveedores.id_proveedor','proveedores.nombre_proveedor','proveedores.rfc_proveedor','proveedores.celular_proveedor',
                        'proveedores.email_proveedor','razonsocials.id_razonsocial','razonsocials.tipo_razonsocial as razon','proveedores.tipopersona_proveedor','proveedores.deleted_at')
                               ->where('id_proveedor',$id_proveedor)
                               ->get();

        $razonsocials    = razonsocials::all();
        



       

        return view ('proveedor.edit')
               ->with('data',$data[0])
               ->with('razonsocials',$razonsocials); 

        
    }

    

    public function updateproveedor(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[
            'nombre_proveedor'       => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'rfc_proveedor'          => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            
            'celular_proveedor'     => 'required|regex:/^[0-9]{10}$/',
            'email_proveedor'        => 'required|email', 
            'tipopersona_proveedor'  => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            'id_razonsocial'         => 'required',
            
           
            
        ]); 


        $data = proveedores::withTrashed()->find($request->id_proveedor);

        
        
        $data->nombre_proveedor      = $request->nombre_proveedor; 
        $data->rfc_proveedor   = $request->rfc_proveedor; 
       
        $data->celular_proveedor    = $request->celular_proveedor; 
        $data->email_proveedor       = $request->email_proveedor; 
        $data->tipopersona_proveedor       = $request->tipopersona_proveedor; 
        $data->id_razonsocial = $request->id_razonsocial; 
       
        
        $data->save();

        Session::flash('mensaje',"El proveedor $request->nombre_proveedor ha sido Actualizada correctamente");
        return redirect()->to('electronica_proveedor');
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
