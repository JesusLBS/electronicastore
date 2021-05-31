<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\roles;
use App\Models\informacionclientes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Auth; 
use DataTables;
use PDF;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Excel;

class usercontroller extends Controller
{
    private $excel;
    public function __construct(Excel $excel){
        $this->excel = $excel;
        $this->middleware('auth');
    }

    public function export()
    {
        return $this->excel->download(new UsersExport, 'users.xlsx');
         //return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import() 
    {
        $this->excel->import(new UsersImport, request()->file('file'));
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        /*
        $consulta = User::orderBy('id','DESC')
                ->take(1)->get();
        $cuantos =count($consulta);


        $rol = roles::orderBy('rol')->get();
        $consulta2 = User::withTrashed()->join('roles','roles.id_rol','=','users.id_rol')
                                        ->select('users.id','users.name','users.email','users.password','users.celular','users.img','users.deleted_at','roles.rol','roles.id_rol')

                                    ->get();

        if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id + 1;
        }

        //dd($consulta2);

        return view ('users/user')
        ->with('id_sigue',$id_sigue)
        ->with('rol',$rol)
        ->with('consulta2',$consulta2);
        */


$consulta = User::orderBy('id','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);
        $rol = roles::orderBy('rol')->get();

if ($cuantos == 0) {
            $id_sigue = 1;
        }
        else{
            $id_sigue = $consulta[0]->id + 1;
        }


//Strt DataTables with ajax

            if ($request->ajax()) {


                $data      =  User::withTrashed()->join('roles','roles.id_rol','=','users.id_rol')
                                                    ->select('users.id','users.name','users.email','users.password','users.celular','users.img','users.deleted_at','roles.rol','roles.id_rol')

                                                ->get();
            return DataTables::of($data)
                    //->addIndexColumn()
                    ->addColumn('btn',function($data){

            $btn = '&nbsp;';

            if ($data->deleted_at) {
                $btn .= '<button type="button" name="activaruser"  id="'.$data->id.'" class="activaruser btn btn-success  btn-sm" data-toggle="modal" data-target="#mactivaru">Activar</button>';
                $btn .= '&nbsp;&nbsp';
                $btn .= '<button type="button" name="eliminaruser"  id="'.$data->id.'" class="eliminaruser btn btn-danger  btn-sm" data-toggle="modal" data-target="#mborraruser">Eliminar</button>';
            }else{
                if ($data->estatus == 'Sin Definir')  {
                $btn .= '<a href="javascript:void(0)" onclick="edituser('.$data->id.')"><button type="button" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#staticBackdrop">Definir Pedido</button></a>';
                $btn .= '&nbsp;&nbsp';
                $btn .= '<button type="button" name="desactivaruser" id="'.$data->id.'" class="desactivaruser btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivaru">Desactivar</button>';
                }
                else{
                //$btn .='<a href="javascript:void(0)" onclick="desactivacion('.$data->id.')"><button type="button" class="btn btn-outline-danger  btn-sm">desactivacion</button></a>';
                //$btn .= '&nbsp;&nbsp';
                //$btn .= '<a href="javascript:void(0)" onclick="edituser('.$data->id.')"><button type="button" class="btn btn-outline-primary  btn-sm"><span class="ti-pencil-alt" title="Ver en pagina completa">Ver en pagina completa</span></button></a>';
                //$btn .= '&nbsp;&nbsp';
                $btn .= '<a href="javascript:void(0)" onclick="editusermodal('.$data->id.')"><button type="button" class="btn btn-outline-primary  btn-sm" data-toggle="modal" data-target="#detallepedido"><span class="ti-pencil-alt" title="Editar">Editar</span></button></a>';
                $btn .= '&nbsp;&nbsp';
                $btn .= '<button type="button" name="desactivaruser" id="'.$data->id.'" class="desactivaruser btn btn-warning btn-sm" data-toggle="modal" data-target="#mdesactivaru">Desactivar</button>';
                }
            }

            return $btn;
        })



/*
        ->addColumn('img',function($data){


            $img = '<a href="#" class="rounded-circle mr-3" data-toggle="tooltip" title=""><img class="img rounded" with=55 height=55 
            src="archivos/' .$data->img. '" name="img"></a>';



            return $img;
        })


        ->rawColumns(['img'])*/
        ->rawColumns(['btn'])
        ->make(true);
}




return view ('users/user')
->with('id_sigue',$id_sigue)
->with('rol',$rol);
//->with('consulta2',$consulta2);


    }

    public function pdfuser(){

        $pdfuser = User::all();

       /* $pdfuser = User::withTrashed()->join('roles','roles.id_rol','=','users.id_rol')
                                        ->select('users.id','users.name','users.email','users.password','users.celular','users.img','users.deleted_at','roles.rol','roles.id_rol')

                                       ->get();
*/

  //      dd($pdfuser);
        $pdf = \PDF::loadView('users.pdf',compact('pdfuser'));
        return $pdf->download('pdf_user.pdf');
    }



    public function desactivaruser($id)
    {
        // Desactivacion
        //$users = User::find($id);
        $users = User::findorFail($id);
        $users->delete();

        return back();
    }

    public function activaruser($id)
    {
        // Activacion
        User::withTrashed()->where('id',$id)->restore();

        //Session::flash('mensaje',"El Usuario ha sido Activado correctamente");

        return back();
    }
    public function borraruser($id)
    {
        // Eliminacion

        User::withTrashed()->find($id)->forceDelete();
           // Session::flash('mensajedelete',"Informacion del Usuario Eliminada correctamente");
        return back();


        /*$buscauser = informacionclientes::where('id',$id)->get();
        $cuantos = count($buscauser);
        $cuantos = 0;
        if ($cuantos == 0) {
            $users = User::withTrashed()->find($id)->forceDelete();
           // Session::flash('mensajedelete',"Informacion del Usuario Eliminada correctamente");
        return back();

        }
        else{
            //Session::flash('mensajed',"El Usuario no se ha podido Eliminar ya que contiene registros en otra tabla");
        return back();
        }*/

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
            'name'       => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'email'      => 'required|email',
            'img'        => 'image|mimes:gif,jpeg,png',
            'celular'    => 'required|regex:/^[0-9]{10}$/',
        ]);

 //dd($request);
        $file = $request->file('img');
        if ($file<>"") {
            $img  = $file->getClientOriginalName();
            $img2 = $request->id . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 ="sinfoto.png";
        }

       // dd($request);

        $newuser = new User;

        $newuser->name          = $request->input('name');
        $newuser->email         = $request->input('email');
        $newuser->aceptotc_c    = 1;
        $newuser->celular       = $request->input('celular');
        $newuser->activo        = $request->input('activo');
        $newuser->id_rol        = $request->input('id_rol');
        $newuser->img           = $img2;

        $newuser->password = Crypt::encryptString($request->password);

        $newuser->save();


        Session::flash('mensaje',"El Usuario  $request->name ha sido Agregado correctamente");
        return redirect()->to('electronica_users');

    }

    public function editar_user($id)
    {
        $datauser = User::withTrashed()->join('roles','roles.id_rol','=','users.id_rol')
                                        ->select('users.id','users.name','users.email','users.activo','users.celular','users.img','users.deleted_at',
                                            'roles.rol as rolusers','roles.id_rol')

                                    ->where('id',$id)
                                    ->get();
        $rol      = roles::all();
        //dd($datauser);


        return view ('users.edituser')

            ->with('rol',$rol)
            ->with('datauser',$datauser[0]);
    }

/*    public function editar_user2($id)
    {

        $datauser = User::withTrashed()->join('roles','roles.id_rol','=','users.id_rol')
                                        ->select('users.id','users.name','users.email','users.activo','users.celular','users.img','users.deleted_at',
                                            'roles.rol as rolusers','roles.id_rol')

                                    ->where('id',$id)
                                    ->get();
        $rol      = roles::all();
        //dd($datauser);


        return view ('users.edituser')

            ->with('rol',$rol)
            ->with('datauser',$datauser[0]);
    }
*/
    public function editar_user2($id)
    {
        $data = User::withTrashed()->join('roles','roles.id_rol','=','users.id_rol')
                                        ->select('users.id','users.name','users.email','users.activo','users.celular','users.img','users.deleted_at',
                                            'roles.rol as rolusers','roles.id_rol')

                                    ->where('id',$id)
                                    ->get();

        return response()->json($data);
    }



    public function updateuser(Request $request)
    {

    //return $request->input();

        $this->validate($request,[
            'id'    => 'required',
            'name'  => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'email' => 'required|email',
            'img'   => 'image|mimes:gif,jpeg,png',
            'activo' => 'required',
        ]);

        $file = $request->file('img');
        if ($file<>"") {
            $img  = $file->getClientOriginalName();
            $img2 = $request->id . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }

        $datauser = User::withTrashed()->find($request->id);

        $datauser->name =  $request->name;
        $datauser->email =  $request->email;
        $datauser->activo =  $request->activo;
        if ($file<>"") {
            $datauser->img = $img2;
        }
        $datauser->save();

        Session::flash('mensaje',"El Usuario $request->name ha sido Actualizado correctamente");
        return redirect()->to('electronica_users');
    }

    public function userupdate(Request $request)
    {

    //return $request->input();

        $this->validate($request,[
            'id'    => 'required',
            'name'  => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'email' => 'required|email',
            'img'   => 'image|mimes:gif,jpeg,png',
            'activo' => 'required',
        ]);

        $file = $request->file('img');
        if ($file<>"") {
            $img  = $file->getClientOriginalName();
            $img2 = $request->id . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }

        $datauser = User::withTrashed()->find($request->id);

        $datauser->name =  $request->name;
        $datauser->celular =  $request->celular;
        $datauser->id_rol =  $request->id_rol;
        $datauser->email =  $request->email;
        $datauser->activo =  $request->activo;
        if ($file<>"") {
            $datauser->img = $img2;
        }
        $datauser->save();

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