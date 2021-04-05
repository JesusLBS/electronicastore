<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\informacionclientes;
use App\Models\estados;
use App\Models\formapagos; 
use App\Models\vias;  
use App\Models\User;
use App\Models\municipios;
use Session; 
   
class informacionclientescontroller extends Controller
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
    
    public function desactivarinfcliente($id_infcliente)
    {
        // Desactivar 
        $pagocliente = informacionclientes::find($id_infcliente);
        $pagocliente->delete(); 
        
        Session::flash('mensajed',"Cliente Desactivado correctamente");

        return redirect()->to('electronica_cliente');
    }

    public function activarinfcliente($id_infcliente)
    {
        // Activacion
        informacionclientes::withTrashed()->where('id_infcliente',$id_infcliente)->restore();
        
        Session::flash('mensaje',"Cliente Activado correctamente");

        return redirect()->to('electronica_cliente');
    }
    public function borrarinfcliente($id_infcliente)
    {
        // Eliminacion
        $informacionclientes = informacionclientes::withTrashed()->find($id_infcliente)->forceDelete();

        Session::flash('mensajedelete',"Informacion del cliente Eliminada correctamente");

        return redirect()->to('electronica_cliente');
    }
    /*-----------------------------------------------------------Start Cliente----------------------------------------------*/
    public function index()
    {
        $consulta = informacionclientes::orderBy('id_infcliente','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        if ($cuantos == 0) {
            $id_sigue = 1; 
        }
        else{
            $id_sigue = $consulta[0]->id_infcliente + 1;
        }
        $estados = estados::orderBy('nombre_estado')->get();
        $users = User::orderBy('id')->get();
        $vias = vias::orderBy('tipo_via')->get();
        $consulta2 = informacionclientes::withTrashed()->join('estados','informacionclientes.id_estado','=','estados.id_estado')
                                                       ->join('users','informacionclientes.id','=','users.id')
                ->select('informacionclientes.id_infcliente','informacionclientes.nombre_cliente','informacionclientes.apellido_pcliente','informacionclientes.apellido_mcliente',
                        'informacionclientes.email_cliente','users.id','users.name','users.img','estados.nombre_estado','informacionclientes.celular_cliente','informacionclientes.deleted_at')
                ->get();
        //return $id_sigue;
        return view ('cliente/cliente')
            ->with('id_sigue',$id_sigue)
            ->with('estados',$estados)
            ->with('vias',$vias)
            ->with('users',$users)
            ->with('consulta2',$consulta2);         
    }

    public function pago()
    {
        $consulta = informacionclientes::orderBy('id_infcliente','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id_infcliente + 1;
        }

        //return $id_sigue;

        $estados = estados::orderBy('nombre_estado')->get();
        $vias = vias::orderBy('tipo_via')->get();
        $User = User::orderBy('id')->get();
        $municipio = municipios::orderBy('nombre_municipio')->get();
        $formapagos = formapagos::orderBy('forma_pago')->get();

        return view ('cliente/infcliente')
            ->with('id_sigue',$id_sigue)
            ->with('estados',$estados)
            ->with('vias',$vias)
            ->with('User',$User)
            ->with('municipio',$municipio)
            ->with('formapagos',$formapagos);
       
    }

    public function guardarcliente(Request $request)
    {     
        
         $this->validate($request,[
            'nombre_cliente'       => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'apellido_pcliente'    => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'apellido_mcliente'    => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'direccion_cliente'    => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            
            'colonia_cliente'      => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'ciudad_cliente'       => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            
            'codigo_postalcliente' => 'required|regex:/^[0-9]{5}$/',
            'email_cliente'        => 'required|email',
            'celular_cliente'      => 'required|regex:/^[0-9]{10}$/',
           
             
        ]);



        $cliente = new informacionclientes;

        $cliente->id_infcliente            = $request->input('id_infcliente');
        $cliente->id                       = $request->input('id');
        $cliente->nombre_cliente           = $request->input('nombre_cliente');
        $cliente->apellido_pcliente        = $request->input('apellido_pcliente');
        $cliente->apellido_mcliente        = $request->input('apellido_mcliente');
        $cliente->direccion_cliente        = $request->input('direccion_cliente');
        $cliente->departamento_cliente     = $request->input('departamento_cliente');
        $cliente->id_municipio             = $request->input('id_municipio');
        $cliente->colonia_cliente          = $request->input('colonia_cliente'); 
        $cliente->ciudad_cliente           = $request->input('ciudad_cliente'); 
        $cliente->id_estado                = $request->input('id_estado'); 
        $cliente->codigo_postalcliente     = $request->input('codigo_postalcliente');
        $cliente->sexo_cliente             = $request->input('sexo_cliente'); 
        $cliente->email_cliente            = $request->input('email_cliente'); 
        $cliente->celular_cliente          = $request->input('celular_cliente'); 
        $cliente->id_via                   = $request->input('id_via'); 
        $cliente->referencia_cliente       = $request->input('referencia_cliente');
    
        $cliente->save();

        Session::flash('mensaje',"Informacion de $request->nombre_cliente $request->apellido_pcliente $request->apellido_mcliente se agregro correctamente");
        return redirect()->to('electronica_cliente');
    

            //return $request->input();
       
    }
     public function editar_infcliente($id_infcliente)
    {
        //$data = informacionclientes::withTrashed()->find($id_infcliente);


        $data = informacionclientes::withTrashed()->join('estados','informacionclientes.id_estado','=','estados.id_estado')
                                                  ->join('vias','informacionclientes.id_via','=','vias.id_via')
                                                  ->join('users','informacionclientes.id','=','users.id')
                                                  ->join('municipios','informacionclientes.id_municipio','=','municipios.id_municipio')
                ->select('informacionclientes.id_infcliente','informacionclientes.nombre_cliente','informacionclientes.apellido_pcliente','informacionclientes.apellido_mcliente',
                         'informacionclientes.direccion_cliente','informacionclientes.colonia_cliente','informacionclientes.ciudad_cliente',
                         'informacionclientes.codigo_postalcliente','informacionclientes.email_cliente','informacionclientes.sexo_cliente',
                         'informacionclientes.departamento_cliente','informacionclientes.celular_cliente','informacionclientes.referencia_cliente',
                         'estados.nombre_estado as est','estados.id_estado','vias.tipo_via as viat','vias.id_via',
                         'municipios.nombre_municipio as muni','municipios.id_municipio','users.name as usuarios','users.id')
                ->where('id_infcliente',$id_infcliente)
                ->get();

        $estados    = estados::all();
        $municipios = municipios::all();
        $vias       = vias::all();
        $users      = user::all();




       

        return view ('cliente.editcliente')
               ->with('data',$data[0])
               ->with('estados',$estados)
               ->with('municipios',$municipios) 
               ->with('vias',$vias)
               ->with('users',$users) ; 

        
    }

    public function updateinfcliente(Request $request)
    {

    //return $request->input();

        $this->validate($request,[
            'nombre_cliente'       => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'apellido_pcliente'    => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'apellido_mcliente'    => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'direccion_cliente'    => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            
            'colonia_cliente'      => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'ciudad_cliente'       => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            
            'codigo_postalcliente' => 'required|regex:/^[0-9]{5}$/',
            'email_cliente'        => 'required|email',
            'celular_cliente'      => 'required|regex:/^[0-9]{10}$/',
            'sexo_cliente'         => 'required',
           
            
        ]);

        $data = informacionclientes::withTrashed()->find($request->id_infcliente);

       
        $data->nombre_cliente           = $request->input('nombre_cliente');
        $data->apellido_pcliente        = $request->input('apellido_pcliente');
        $data->apellido_mcliente        = $request->input('apellido_mcliente');
        $data->direccion_cliente        = $request->input('direccion_cliente');
        $data->departamento_cliente     = $request->input('departamento_cliente');
        $data->colonia_cliente          = $request->input('colonia_cliente'); 
        $data->ciudad_cliente           = $request->input('ciudad_cliente'); 
        $data->id_estado                = $request->input('id_estado'); 
        $data->codigo_postalcliente     = $request->input('codigo_postalcliente'); 
        $data->sexo_cliente             = $request->input('sexo_cliente'); 

        $data->email_cliente            = $request->input('email_cliente'); 
        $data->celular_cliente          = $request->input('celular_cliente'); 
        $data->referencia_cliente       = $request->input('referencia_cliente');
        $data->id_via                   = $request->input('id_via'); 
    
        $data->save();

    Session::flash('mensaje',"Datos del cliente $request->nombre_cliente $request->apellido_pcliente $request->apellido_mcliente se ha modificado correctamente");
    return redirect()->to('electronica_cliente');
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
