<?php

namespace App\Http\Controllers;
use App\Models\User;
use Session;
use Auth;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function index()
    {
        $consulta = User::orderBy('id','DESC')
                   ->take(1)->get();
        $cuantos =count($consulta);

        $consulta2 = User::select(['id','name','email'])
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
        ->with('consulta2',$consulta2);
    }


     public function editar_user($id)
    {
        $datauser = User::find($id);
        //dd($datauser);
        return view ('users.useredit',['datauser'=>$datauser]); 
    }


    public function updateuser(Request $request)
    {

    //return $request->input();
 
        $this->validate($request,[ 
            'id'    => 'required',
            'name'  => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'email' => 'required|email',
            
        ]);

        

        $datauser = User::find($request->id);

       
        $datauser->name =  $request->name;
        $datauser->email =  $request->email;
        
        $datauser->save();

        Session::flash('mensaje',"El Usuario $request->name ha sido Actualizado correctamente");
        return redirect()->to('electronica_users');
    }

}
