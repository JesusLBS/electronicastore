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
             $users  = User::orderBy('name')->get();
             $consulta2      = pedidos::withTrashed()->join('users','pedidos.id','=','users.id')
                                                ->select('pedidos.id_pedido','users.name','pedidos.total_piezas',
                                                          'pedidos.fecha_pedido','pedidos.fechaentrega_pedido','pedidos.estatus','pedidos.deleted_at')
                                       ->get();
            return DataTables::of($consulta2)
                    ->addColumn('btn','pedidos/actions')
                    ->rawColumns(['btn'])
                    ->toJson();
        }
       
        








        //return $consulta2;
        //return Response()->json($consulta2);
        return view('pedidos.index');
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
