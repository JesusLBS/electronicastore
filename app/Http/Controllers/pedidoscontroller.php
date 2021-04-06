<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DataTables;

use App\Models\User;
use App\Models\marcas;
use App\Models\pedidos;
use App\Models\productos;
use App\Models\informacionclientes;

 



class pedidoscontroller extends Controller
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

    public function index(Request $request)
    {
        
        if ($request->ajax()) {


             
             $pedidos      = pedidos::withTrashed()->join('users','pedidos.id','=','users.id')
                                                     ->select('pedidos.id_pedido','users.name','pedidos.total_piezas',
                                                          'pedidos.fecha_pedido','pedidos.fechaentrega_pedido','pedidos.estatus','pedidos.deleted_at')
                                                      ->get();
            return DataTables::of($pedidos)
                    ->addColumn('btn','pedidos/actions')
                    ->rawColumns(['btn'])
                    ->toJson();
        }


        $User = User::orderBy('id')->select('users.id','users.name')
                                    ->get();
        $productos = productos::orderBy('id_producto')->select('productos.id_producto','productos.nombre_producto')
                                    ->get();

     



        //return $consulta2;
        //return Response()->json($consulta2);
        return view('pedidos.index')
             ->with('User',$User)
             ->with('productos',$productos);
        /*return view('pedidos.index');
             ->with('users',$users)
             ->with('consulta2',$consulta2);*/
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
        $this->validate($request,[

            'id'                  => 'required',
            'fecha_pedido'        => 'required',
            'fechaentrega_pedido' => 'required',
            'hora_pedido'         => 'required',
            
        ]);

        //dd($request);
        

        $pedidos = new pedidos;

         
        $pedidos->fecha_pedido          = $request->input('fecha_pedido'); 
        $pedidos->fechaentrega_pedido   = $request->input('fechaentrega_pedido');
        $pedidos->hora_pedido           = $request->input('hora_pedido');
        $pedidos->estatus               = 'En Proceso';
        $pedidos->total_piezas          = 'Sin Definir';
        $pedidos->id                    = $request->input('id'); 
         

           
        $pedidos->save();
        return back();

        
    }

    public function desactivarpedido($id_pedido)
    {
        // Desactivacion
        $data = pedidos::find($id_pedido); 
        $data->delete();

        return back();
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
