<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\cookiecontroller;
use App\Http\Controllers\usercontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/ 

Auth::routes();
//Cookies
Route::get('/', [App\Http\Controllers\cookiecontroller::class, 'gethome'])->name('gethome');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/login/{user}',[App\Http\Controllers\Auth\LoginController::class,'login2FA'])->name('login.2fa');

Route::get('show/{id}',[App\Http\Controllers\Auth\LoginController::class,'show'])->name('show');


/*Users*/
Route::get('electronica_users',[usercontroller::class,'index'])->name('user');

Route::post('electronica_registeruser',[usercontroller::class,'store'])->name('registeruser');

//Desactivar
Route::post('desactivaruser/{id}',[usercontroller::class,'desactivaruser'])->name('desactivaruser');
//Activacion
Route::post('activaruser/{id}',[usercontroller::class,'activaruser'])->name('activaruser');
//Borrar
Route::post('borraruser/{id}',[usercontroller::class,'borraruser'])->name('borraruser');
//Editar
Route::get('editar_user/{id}',[usercontroller::class,'editar_user'])->name('editar_user');

Route::post('/updateuser',[usercontroller::class,'updateuser'])->name('updateuser');