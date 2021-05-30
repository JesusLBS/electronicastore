<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;
use App\Models\marcas;
use App\Models\productcategorias;
use App\Models\proveedores;
use DataTables;
use Session; 



class productoscontroller extends Controller
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
        /*
        $productcategorias  = productcategorias::orderBy('nombre_pcategoria')->get();
        $consulta2      = productos::withTrashed()->join('marcas','productos.id_marca','=','marcas.id_marca')
                                            
                                              ->join('proveedores','productos.id_proveedor','=','proveedores.id_proveedor')
                                                       
                                              ->join('productcategorias','productos.id_pcategoria','=','productcategorias.id_pcategoria')
                                                  ->select('productos.id_producto','productos.nombre_producto','productos.preciocompra_producto','productos.precioventa_producto','productcategorias.nombre_pcategoria','proveedores.nombre_proveedor','marcas.nombre_marca','productos.imgpr','productos.deleted_at')
                                       ->get();
        //return $id_sigue;
        return view ('producto/index')
             ->with('productcategorias',$productcategorias)
             ->with('consulta2',$consulta2);
             */
        //-------------------------------------------------------------------------------

        if ($request->ajax()) {
 

       $data      = productos::withTrashed()->join('marcas','productos.id_marca','=','marcas.id_marca')
                                            
                                              ->join('proveedores','productos.id_proveedor','=','proveedores.id_proveedor')
                                                       
                                              ->join('productcategorias','productos.id_pcategoria','=','productcategorias.id_pcategoria')
                                                  ->select('productos.id_producto','productos.nombre_producto','productos.preciocompra_producto','productos.precioventa_producto','productcategorias.nombre_pcategoria','proveedores.nombre_proveedor','marcas.nombre_marca','productos.imgpr','productos.deleted_at')
                                       ->get();

       return DataTables::of($data)
               ->addIndexColumn()
               ->addColumn('btn',function($data){
                $btn = '&nbsp;';

                if ($data->deleted_at) {
                   $btn .= '<button type="button" name="activauser"  id="'.$data->id_producto.'" class="activauser btn btn-success  btn-sm" data-toggle="modal" data-target="#mactivarp">Activar</button>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="eliminaruser"  id="'.$data->id_producto.'" class="eliminaruser btn btn-danger  btn-sm" data-toggle="modal" data-target="#mborrarp">Eliminar</button>';
                }else{
                   if ($data->estatus == 'Sin Definir')  {
                   $btn .= '<a href="javascript:void(0)" onclick="edituser('.$data->id_producto.')"><button type="button" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#staticBackdrop">Definir Pedido</button></a>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="desactivaruser" id="'.$data->id_producto.'" class="desactivaruser btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivaru">Desactivar</button>';
                   }
                   else{
                   $btn .= '<a href="javascript:void(0)" onclick="showpedido('.$data->id_producto.')"><button type="button" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#detallepedido"><span class="ti-pencil-alt" title="Editar">Editar</span></button></a>';
                   $btn .= '&nbsp;&nbsp';
                   $btn .= '<button type="button" name="desactivaruser" id="'.$data->id_producto.'" class="desactivaruser btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivaru">Desactivar</button>';
                   }
                }

               return $btn;
           })
           ->rawColumns(['btn'])
           ->make(true);
       }
       $productcategorias  = productcategorias::orderBy('nombre_pcategoria')->get();
       return view ('producto/index')
             ->with('productcategorias',$productcategorias);
    }
    

    public function registerproducto()
    {
        $consulta = productos::orderBy('id_producto','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta); 

        $marcas          = marcas::orderBy('nombre_marca')->get();
        
        $proveedores       = proveedores::orderBy('nombre_proveedor')->get();
        $productcategorias    = productcategorias::orderBy('nombre_pcategoria')->get();
        
        $consulta2  = productos::withTrashed()->join('marcas','productos.id_marca','=','marcas.id_marca')
                                            
                                              ->join('proveedores','productos.id_proveedor','=','proveedores.id_proveedor')
                                                       
                                              ->join('productcategorias','productos.id_pcategoria','=','productcategorias.id_pcategoria')
                                                  ->select('proveedores.nombre_proveedor','marcas.nombre_marca',
                                                           'productcategorias.nombre_pcategoria ');

        if ($cuantos == 0) {
            $id_sigue = 1; 
        }
        else{
            $id_sigue = $consulta[0]->id_producto + 1;
        }

        //return $id_sigue;

        return view ('producto/registerproducto')
        
            ->with('id_sigue',$id_sigue)
            ->with('marcas',$marcas)
            ->with('proveedores',$proveedores)
            
            ->with('productcategorias',$productcategorias)
            
            ->with('consulta2',$consulta2); 
            

        
    }


    public function desactivarproducto($id_producto)
    {
        // Desactivacion
        $productos = productos::find($id_producto);
        $productos->delete();
        Session::flash('mensajed',"El producto ha sido Desactivada correctamente");

        return redirect()->to('electronica_producto');
    }
    public function activarproducto($id_producto)
    {
        // Activacion
        productos::withTrashed()->where('id_producto',$id_producto)->restore();
        
        Session::flash('mensaje',"El producto ha sido Activada correctamente");

        return redirect()->to('electronica_producto');
    }
    public function borrarproducto($id_producto)
    {
        // Eliminacion


        $buscaproducto = productos::where('id_producto',$id_producto)->get();
        $cuantos = count($buscaproducto);
        if ($cuantos == 0) {
            $productos = productos::withTrashed()->find($id_producto)->forceDelete();
            Session::flash('mensajedelete',"Informacion del producto ha sido Eliminada correctamente");
            return redirect()->to('electronica_producto');
                        
        }
        else{
            Session::flash('mensajed',"La producto no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_producto');
                        

        } 
         
    } 
    
    public function guardarproducto(Request $request)
    {     
        
        $this->validate($request,[
            'nombre_producto'            => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            'descripcion_producto'       => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            'numserie_producto'          => 'required|regex:/^[0-9]+$/',
            'preciocompra_producto'      => 'required|regex:/^[0-9,.]+$/',
            'precioventa_producto'       => 'required|regex:/^[0-9,.]+$/', 
            'garantiatienda_producto'    => 'required',
            'id_pcategoria'              => 'required',
            'id_proveedor'               => 'required', 
            'id_marca'                   => 'required',
            'imgpr'                      => 'image|mimes:gif,jpeg,png',

        ]); 


        $file = $request->file('imgpr');
        if ($file<>"") {
            $imgpr  = $file->getClientOriginalName();
            $img2 = $request->id_producto . $imgpr;
            \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 ="psinfoto.png";
        }
 


 

 //dd($request);
 
      

        $producto = new productos;

        $producto->nombre_producto         = $request->input('nombre_producto'); 
        $producto->descripcion_producto    = $request->input('descripcion_producto'); 
        $producto->numserie_producto       = $request->input('numserie_producto'); 
        $producto->preciocompra_producto   = $request->input('preciocompra_producto'); 
        $producto->precioventa_producto    = $request->input('precioventa_producto');
        $producto->garantiatienda_producto = $request->input('garantiatienda_producto'); 
        $producto->id_pcategoria           = $request->input('id_pcategoria'); 
        $producto->id_proveedor            = $request->input('id_proveedor');         
        $producto->id_marca                = $request->input('id_marca'); 
        $producto->imgpr                   = $img2;
        

           
        $producto->save();

        Session::flash('mensaje',"El producto  $request->nombre_producto ha sido agregada correctamente");
        return redirect()->to('electronica_producto');
        
 
       
    }

    public function editar_producto($id_producto)
    {
        
        

        $data = productos::withTrashed()->join('marcas','productos.id_marca','=','marcas.id_marca')
                                                  
                                                  ->join('productcategorias','productos.id_pcategoria','=','productcategorias.id_pcategoria')
                                                  ->join('proveedores','productos.id_proveedor','=','proveedores.id_proveedor')
                ->select('productos.id_producto','productos.imgpr','productos.nombre_producto','productos.descripcion_producto','productos.numserie_producto',
                         'productos.preciocompra_producto','productos.precioventa_producto','productcategorias.id_pcategoria','productos.garantiatienda_producto',
                         'productos.id_marca',
                         'marcas.nombre_marca as marc','marcas.id_marca',
                         'proveedores.nombre_proveedor as prov','proveedores.id_proveedor','productcategorias.nombre_pcategoria as pcatego','productcategorias.id_pcategoria')
                ->where('id_producto',$id_producto)
                ->get();

        $marcas    = marcas::all();
        $proveedores = proveedores::all();
        $productcategorias      = productcategorias::all();




       //dd($data);

        return view ('producto.edit')
               ->with('data',$data[0])
               ->with('marcas',$marcas)
               ->with('proveedores',$proveedores) 
               
               ->with('productcategorias',$productcategorias) ; 

        
    }

    
 
    public function updateproducto(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[
            'nombre_producto'            => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            'descripcion_producto'       => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ,0-9]+$/',
            'numserie_producto'          => 'required|regex:/^[0-9]+$/',
            'preciocompra_producto'      => 'required|regex:/^[0-9,.]+$/',
            'precioventa_producto'       => 'required|regex:/^[0-9,.]+$/', 
            'garantiatienda_producto'    => 'required',
            'id_marca'                   => 'required',
            'id_proveedor'               => 'required',
            'id_pcategoria'              => 'required',
            
            'imgpr'                      => 'image|mimes:gif,jpeg,png',
        ]);

        //dd($request);

        $file = $request->file('imgpr');
        if ($file<>"") {
            $imgpr  = $file->getClientOriginalName();
            $img2 = $request->id_producto . $imgpr;
            \Storage::disk('local')->put($img2, \File::get($file));
        }
 
        $data = productos::withTrashed()->find($request->id_producto);
 
        
        $data->id_producto             = $request->id_producto; 
        $data->nombre_producto         = $request->nombre_producto; 
        $data->descripcion_producto    = $request->descripcion_producto; 
        $data->numserie_producto       = $request->numserie_producto; 
        $data->preciocompra_producto   = $request->preciocompra_producto; 
        $data->precioventa_producto    = $request->precioventa_producto; 
        $data->garantiatienda_producto = $request->garantiatienda_producto; 
        $data->id_marca                = $request->id_marca; 
        $data->id_proveedor            = $request->id_proveedor; 
        $data->id_pcategoria           = $request->id_pcategoria; 
        if ($file<>"") {
            $data->imgpr = $img2;
        }
        
        $data->save();

        Session::flash('mensaje',"El producto $request->nombre_producto ha sido Actualizada correctamente");
        return redirect()->to('electronica_producto');
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
