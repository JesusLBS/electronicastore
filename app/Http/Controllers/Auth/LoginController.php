<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;


use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Writer as BaconQrCodeWriter;

use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;


use Illuminate\Support\Facades\Log;

use BaconQrCode\Writer;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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


        $this->middleware('guest')->except('logout');
    }


public function login(Request $request)
{
    $this->validateLogin($request);

    if ($this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);

        return $this->sendLockoutResponse($request);
    }

    $user = User::where($this->username(), '=', $request->email)->first();

    if (password_verify($request->password, optional($user)->password)) {
        $this->clearLoginAttempts($request);

        $user->update(['token_login' => (new Google2FA)->generateSecretKey()]);

        $urlQR = $this->createUserUrlQR($user);
        Log::channel('login')->info('El usuario' .$user->name. 'con la clave' . $user->id.'Ingreso_email_y_password_correcto');
        
        return view("auth.2fa", compact('urlQR', 'user'));
    }
    
    $this->incrementLoginAttempts($request);
    
    return $this->sendFailedLoginResponse($request);
}


function createUserUrlQR($user)
{
$google2fa = app(Google2FA::class);

$renderer = new ImageRenderer(
new RendererStyle(400),
new SvgImageBackEnd()
);
$writer = new Writer($renderer);

$g2faUrl = $google2fa->getQRCodeUrl(
config('app.name'),
$user->email,
$user->token_login
);

$qrcode_image = $writer->writeString($g2faUrl);



return $qrcode_image;

}
 

public function login2FA(Request $request, User $user)
{

    //dd($request);
    //echo "Verificado";
    
    $request->validate(['code_verification' => 'required']);

    if ((new Google2FA())->verifyKey($user->token_login, $request->code_verification)) {
        \Log::channel('codeqr1')->info('El usuario' .$user->name. 'con la clave' . $user->id.'ingreso el code_QR_correcto');
        $request->session()->regenerate();

        //dd($request);
          Log::channel('loginsuccess')->info('El usuario' .$user->name. 'con la clave' . $user->id.'Se logueo e Ingreso exitosamente en el sistema');
          Auth::login($user);

        
        return redirect()->intended($this->redirectPath());
        
        
    }
    else{
        \Log::channel('codeqr2')->alert('El usuario' .$user->name. 'ingreso code_QR_incorrecto');
            return redirect()->back()->withErrors(['error'=> 'Código de verificación incorrecto']);

    }    
}



 
}
