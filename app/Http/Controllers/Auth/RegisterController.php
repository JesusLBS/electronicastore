<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
 
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    { 
        return Validator::make($data, [
            'name'        => 'required|regex:/^[A-Z][A-Z,a-z, ,ü, é, á, í, ó, ú, ñ]+$/',
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:3', 'confirmed'], 
            'aceptotc_c'  => ['required'],
            'celular'     => 'required|regex:/^[0-9]{10}$/',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        Log::channel('registro')->alert('El usuario Se registro en el sistema');
        

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'celular' => $data['celular'],
          //  'password' => Crypt::encryptString($data['password']),
          'password' => Hash::make($data['password']),
 //            'password' => hash("sha256",$data['password']),
            'img' => 'sinfoto.png',
            'aceptotc_c' => 1,
            'activo' => 1,
            'id_rol' => 2,

 
        ]); 
    }
}

/*
public function store(Request $request ,$aceptotc_c = 1)
    {
        $user = $this->validate(request(), [
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'], 
            'aceptotc_c'  => ['required'],
            'celular'     => ['required'],
            
        ]);
        
        $img2 ="sinfoto.png";

        $newuser = new User;

         
        $newuser->name          = $request->input('name'); 
        $newuser->email         = $request->input('email'); 
        $newuser->password      = $request->input('password'); 
        $newuser->aceptotc_c    = 1; 
        $newuser->img = $img2;
 
           
        $newuser->fill([
            'password' => hash("sha256",$request->password),
        ])->save();

         //Auth::login($user);
        // newuserAuth::login($user,true);

        return redirect()->to('electronica_index');
        
    }
    */