<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\roles;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class usercontroller extends Controller
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


    }

    public function desactivaruser($id)
    {
        // Desactivacion
        $users = User::find($id);
        $users->delete();
        Session::flash('mensajed',"El Usuario ha sido Desactivado correctamente");

        return redirect()->to('electronica_users');
    }
    public function activaruser($id)
    {
        // Activacion
        User::withTrashed()->where('id',$id)->restore();
        
        Session::flash('mensaje',"El Usuario ha sido Activado correctamente");

        return redirect()->to('electronica_users');
    }
    public function borraruser($id)
    {
        // Eliminacion


        //$buscauser = pagoclientes::where('id',$id)->get();
        //$cuantos = count($buscauser);
        $cuantos = 0;
        if ($cuantos == 0) {
            $users = User::withTrashed()->find($id)->forceDelete();
            Session::flash('mensajedelete',"Informacion del Usuario Eliminada correctamente");
            return redirect()->to('electronica_users');
                        
        }
        else{
            Session::flash('mensajed',"El Usuario no se ha podido Eliminar ya que contiene registros en otra tabla");
            return redirect()->to('electronica_users');   
        }
        
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
