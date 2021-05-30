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
use App\Models\detallepedidos;
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


             $data      = pedidos::withTrashed()->join('users','pedidos.id','=','users.id')
                                                     ->select('pedidos.id_pedido','users.name','pedidos.total_piezas',
                                                          'pedidos.fecha_pedido','pedidos.fechaentrega_pedido','pedidos.estatus','pedidos.deleted_at')
                                                      ->get();
            return DataTables::of($data)
                   // ->addIndexColumn()
                    ->addColumn('btn',function($data){

                        $btn = '&nbsp;';

                        if ($data->deleted_at) {
                            $btn .= '<button type="button" name="activarpedido"  id="'.$data->id_pedido.'" class="activarpedido btn btn-success  btn-sm" data-toggle="modal" data-target="#mactivarp">Activar</button>';
                            $btn .= '&nbsp;&nbsp';
                            $btn .= '<button type="button" name="eliminarpedido"  id="'.$data->id_pedido.'" class="eliminarpedido btn btn-danger  btn-sm" data-toggle="modal" data-target="#mborrarp">Eliminar</button>';
                        }else{
                            if ($data->estatus == 'Sin Definir')  {
                            $btn .= '<a href="javascript:void(0)" onclick="editpedido('.$data->id_pedido.')"><button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#staticBackdrop">Definir Pedido</button></a>';
                            $btn .= '&nbsp;&nbsp';
                            $btn .= '<button type="button" name="desactivarpedido" id="'.$data->id_pedido.'" class="desactivarpedido btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivarp">Desactivar</button>';
                            }
                            else{
                            $btn .= '<a href="javascript:void(0)" onclick="showpedido('.$data->id_pedido.')"><button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#detallepedido">Detalles</button></a>';
                            $btn .= '&nbsp;&nbsp';
                            $btn .= '<button type="button" name="desactivarpedido" id="'.$data->id_pedido.'" class="desactivarpedido btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivarp">Desactivar</button>';
                            }
                        }

                        return $btn;
                    })
                    ->rawColumns(['btn'])
                    ->make(true);
        }


        $User = User::orderBy('id')->select('users.id','users.name')
                                    ->get();
        $productos = productos::orderBy('id_producto')->select('productos.id_producto','productos.nombre_producto')->get();


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
        $pedidos->estatus               = 'Sin Definir';
        $pedidos->total_piezas          = 'Sin Definir';
        $pedidos->id                    = $request->input('id'); 
          

           
        $pedidos->save();
        return back();

        
    }

    public function activarpedido($id_pedido)
    {
        // Activacion

        pedidos::withTrashed()->where('id_pedido',$id_pedido)->restore();

        return back();
    }

    public function eliminarpedido($id_pedido)
    {
        // Eliminacion


        $buscarpedido = detallepedidos::where('id_pedido',$id_pedido)->get();
        $cuantos = count($buscarpedido);
        if ($cuantos == 0) {
            $pedidos = pedidos::withTrashed()->find($id_pedido)->forceDelete();
            return back();
                        
        }
        else{
            Session::flash('mensajed',"El pedido no se ha podido Eliminar ya que contiene registros en otra tabla");
            return back();
                        

        }
        
    }
  
    public function desactivarpedido($pedido)
    {
        // Desactivacion
        $data = pedidos::findorFail($pedido); 
        $data->delete();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pedido)
    {
        $data = pedidos::withTrashed()->find($id_pedido);                               

        return response()->json($data); 
    }

    public function show2($id_pedido)
    {
        $data = detallepedidos::where('detallepedidos.id_pedido', $id_pedido)
                                ->join('pedidos','pedidos.id_pedido','=','detallepedidos.id_pedido')
                                ->join('productos','productos.id_producto','=','detallepedidos.id_producto')
                                ->join('marcas','marcas.id_marca','=','productos.id_marca') 
                                ->select('detallepedidos.id_pedido','detallepedidos.id_producto','productos.nombre_producto',
                                         'detallepedidos.precio_producto','marcas.nombre_marca','detallepedidos.cantidad','detallepedidos.subtotal',
                                         'pedidos.estatus')
                                ->get();                                         

        return response()->json($data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pedido)
    {
        $data = pedidos::withTrashed()->find($id_pedido);
        return response()->json($data); 
    }


    public function seleccionado($id_pedido)
    {
        $data = productos::withTrashed()->find($id_pedido);
        return response()->json($data); 
    }

    public function storep(Request $request)
    {
         $this->validate($request,[

            'precio_producto'  => 'required',
            'cantidad'         => 'required',
            'subtotal'         => 'required',
            'id_pedido'        => 'required',
            'id_producto'      => 'required',
            
        ]);        

        $detallepedidos = new detallepedidos;

        $detallepedidos->precio_producto  = $request->input('precio_producto'); 
        $detallepedidos->cantidad         = $request->input('cantidad');
        $detallepedidos->subtotal         = $request->input('subtotal');
        $detallepedidos->id_pedido        = $request->input('id_pedido');
        $detallepedidos->id_producto      = $request->input('id_producto');
                   
        $detallepedidos->save();
        return back();

        
    }

/*
    public function index2(Request $request)
    {    
        if ($request->ajax()) {
     
             $data2   = detallepedidos::withTrashed()->join('productos','detallepedidos.id_producto','=','productos.id_producto')
                                                    ->select('detallepedidos.id_detallepedido','productos.id_producto','productos.nombre_producto','detallepedidos.precio_producto',
                                                          'detallepedidos.cantidad','detallepedidos.subtotal')
                                                      ->get();
            return DataTables::of($data2)
                    ->addColumn('btn',function($data2){             

                        $btn .= '<button type="button" name="eliminarprod"  id="'.$data2->id_detallepedido.'" class="eliminarprod btn btn-danger  btn-sm" data-toggle="modal" data-target="#mborrarprod">Eliminar</button>';                      

                        return $btn;
                    })
                    ->rawColumns(['btn'])
                    ->make(true);
        }

        return back();
        
    }
    */




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'id_pedido'    => 'required',
            'total'        => 'required',
            'total_piezas' => 'required',            
        ]);

        $data = pedidos::withTrashed()->find($request->id_pedido);

       
        $data->total        =  $request->total;
        $data->total_piezas =  $request->total_piezas;
        $data->estatus      = 'En Proceso';
        $data->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*$fun = $_POST["funcion"];

    switch ($fun) {
        case 'funeliminar': destroy();
            
            break;
    }*/

    public function destroy($pedido)
    {
        $data = pedidos::findorFail($pedido); 
        $data->delete();

        return back();
    }
}
