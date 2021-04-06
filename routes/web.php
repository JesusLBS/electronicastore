<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\electronicacontroller;
use App\Http\Controllers\cookiecontroller;
use App\Http\Controllers\usercontroller;


use App\Http\Controllers\viascontroller; 
use App\Http\Controllers\monedascontroller;
use App\Http\Controllers\formapagoscontroller;
use App\Http\Controllers\metodopagoscontroller;
use App\Http\Controllers\estadoscontroller;
use App\Http\Controllers\municipioscontroller;
use App\Http\Controllers\informacionclientescontroller;
use App\Http\Controllers\marcascontroller;
use App\Http\Controllers\productoscategoriascontroller;
use App\Http\Controllers\departamentoscontroller;
use App\Http\Controllers\tipoempleadocontroller;
use App\Http\Controllers\empleadoscontroller;
use App\Http\Controllers\razonsocialcontroller;
use App\Http\Controllers\proveedorescontroller;
use App\Http\Controllers\productoscontroller;
use App\Http\Controllers\tipofacturacontroller;
use App\Http\Controllers\ventacontroller;
use App\Http\Controllers\detalleventacontroller;
use App\Http\Controllers\facturascontroller;
use App\Http\Controllers\pedidoscontroller;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
//Cookies
//Route::get('/', [App\Http\Controllers\cookiecontroller::class, 'gethome'])->name('gethome');


//Aviso-de-privacidad-cookies
Route::get('avisodepri',[electronicacontroller::class,'avisodepri'])->name('avisodepri');
Route::get('cookiesaviso',[electronicacontroller::class,'cookiesaviso'])->name('cookiesaviso');




Route::post('/login/{user}',[App\Http\Controllers\Auth\LoginController::class,'login2FA'])->name('login.2fa');

//Route::get('show/{id}',[App\Http\Controllers\Auth\LoginController::class,'show'])->name('show');





/*
|--------------------------------------------------------------------------
|  Routes
|--------------------------------------------------------------------------
|
|
| 
| 
|
*/


Route::group(['middleware' => 'usuarioadmin'], function(){

	


/*Home - Sistema*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





/*Pedidos*/
Route::get('pedidos', [App\Http\Controllers\pedidoscontroller::class, 'index'])->name('pedidos');
<<<<<<< HEAD
Route::post('store',[pedidoscontroller::class,'store'])->name('store');
//Desactivar
Route::get('desactivarpedido/{id_pedido}',[pedidoscontroller::class,'desactivarpedido'])->name('desactivarpedido');
=======

>>>>>>> parent of 2d83a4c (Accion de agregar es funcional)










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


/*Vias*/
Route::get('electronica_via',[viascontroller::class,'index'])->name('via');
Route::post('electronica_guardarvia',[viascontroller::class,'guardarvia'])->name('guardarvia');
//Editar
Route::get('editar_via/{id_via}',[viascontroller::class,'editar_via'])->name('editar_via');

Route::post('/updatevia',[viascontroller::class,'updatevia'])->name('updatevia');


//Desactivar
Route::post('desactivarvia/{id_via}',[viascontroller::class,'desactivarvia'])->name('desactivarvia');
//Activacion
Route::post('activarvia/{id_via}',[viascontroller::class,'activarvia'])->name('activarvia');
//Borrar
Route::post('borrarvia/{id_via}',[viascontroller::class,'borrarvia'])->name('borrarvia');



/*Moneda*/
Route::get('electronica_moneda',[monedascontroller::class,'index'])->name('moneda');
Route::post('electronica_guardarmoneda',[monedascontroller::class,'guardarmoneda'])->name('guardarmoneda');
//Desactivar
Route::post('desactivarmoneda/{id_moneda}',[monedascontroller::class,'desactivarmoneda'])->name('desactivarmoneda');
//Activacion
Route::post('activarmoneda/{id_moneda}',[monedascontroller::class,'activarmoneda'])->name('activarmoneda');
//Borrar
Route::post('borrarmoneda/{id_moneda}',[monedascontroller::class,'borrarmoneda'])->name('borrarmoneda');
//Editar
Route::get('editar_moneda/{id_moneda}',[monedascontroller::class,'editar_moneda'])->name('editar_moneda');

Route::post('/updatemoneda',[monedascontroller::class,'updatemoneda'])->name('updatemoneda');



/*Forma de pago*/
Route::get('electronica_formapago',[formapagoscontroller::class,'index'])->name('formapago');
Route::post('electronica_guardarformapago',[formapagoscontroller::class,'guardarformapago'])->name('guardarformapago');
//Desactivar
Route::post('desactivarformpago/{id_forma_pago}',[formapagoscontroller::class,'desactivarformpago'])->name('desactivarformpago');
//Activacion
Route::post('activarformpago/{id_forma_pago}',[formapagoscontroller::class,'activarformpago'])->name('activarformpago');
//Borrar
Route::post('borrarformpago/{id_forma_pago}',[formapagoscontroller::class,'borrarformpago'])->name('borrarformpago');
//Editar
Route::get('editar_formpago/{id_forma_pago}',[formapagoscontroller::class,'editar_formpago'])->name('editar_formpago');

Route::post('/updateformpago',[formapagoscontroller::class,'updateformpago'])->name('updateformpago');


/*Metodo de pago*/
Route::get('electronica_metodopago',[metodopagoscontroller::class,'index'])->name('metodopago');
Route::post('electronica_guardarmetodopago',[metodopagoscontroller::class,'guardarmetodopago'])->name('guardarmetodopago');
//Desactivar
Route::post('desactivarmetodopago/{id_metodo_pago}',[metodopagoscontroller::class,'desactivarmetodopago'])->name('desactivarmetodopago');
//Activacion
Route::post('activarmetodopago/{id_metodo_pago}',[metodopagoscontroller::class,'activarmetodopago'])->name('activarmetodopago');
//Borrar
Route::post('borrarmetodopago/{id_metodo_pago}',[metodopagoscontroller::class,'borrarmetodopago'])->name('borrarmetodopago');
//Editar
Route::get('editar_mpago/{id_metodo_pago}',[metodopagoscontroller::class,'editar_mpago'])->name('editar_mpago');

Route::post('/updatempago',[metodopagoscontroller::class,'updatempago'])->name('updatempago');



/*Estado*/
Route::get('electronica_estado',[estadoscontroller::class,'index'])->name('estado');
Route::post('electronica_guardarestado',[estadoscontroller::class,'guardarestado'])->name('guardarestado');
//Editar
Route::get('editar_estado/{id_estado}',[estadoscontroller::class,'editar_estado'])->name('editar_estado');

Route::post('/update-estado',[estadoscontroller::class,'updateestado'])->name('estado.update');


//Desactivar
Route::post('desactivarestado/{id_estado}',[estadoscontroller::class,'desactivarestado'])->name('desactivarestado');
//Activacion
Route::post('activarestado/{id_estado}',[estadoscontroller::class,'activarestado'])->name('activarestado');
//Borrar
Route::post('borrarestado/{id_estado}',[estadoscontroller::class,'borrarestado'])->name('borrarestado');





/*Municipio*/
Route::get('electronica_municipio',[municipioscontroller::class,'index'])->name('municipio');
Route::post('electronica_guardarmunicipio',[municipioscontroller::class,'guardarmunicipio'])->name('guardarmunicipio');
//Editar
Route::get('editar_municipio/{id_municipio}',[municipioscontroller::class,'editar_municipio'])->name('editar_municipio');

Route::post('/updatemunicipio',[municipioscontroller::class,'updatemunicipio'])->name('updatemunicipio');


//Desactivar
Route::post('desactivarmunicipio/{id_municipio}',[municipioscontroller::class,'desactivarmunicipio'])->name('desactivarmunicipio');
//Activacion
Route::post('activarmunicipio/{id_municipio}',[municipioscontroller::class,'activarmunicipio'])->name('activarmunicipio');
//Borrar
Route::post('borrarmunicipio/{id_municipio}',[municipioscontroller::class,'borrarmunicipio'])->name('borrarmunicipio');





/*Cliente*/
Route::get('electronica_cliente',[informacionclientescontroller::class,'index'])->name('cliente');
Route::post('electronica_guardarcliente',[informacionclientescontroller::class,'guardarcliente'])->name('guardarcliente');

/*Informacion Cliente*/
Route::get('electronica_inforcliente',[informacionclientescontroller::class,'pago'])->name('electronica_inforcliente');
//Desactivar cliente
Route::post('desactivarinfcliente/{id_infcliente}',[informacionclientescontroller::class,'desactivarinfcliente'])->name('desactivarinfcliente');
//Activacion
Route::post('activarinfcliente/{id_infcliente}',[informacionclientescontroller::class,'activarinfcliente'])->name('activarinfcliente');
//Borrar
Route::post('borrarinfcliente/{id_infcliente}',[informacionclientescontroller::class,'borrarinfcliente'])->name('borrarinfcliente');
//Editar 
Route::get('editar_infcliente/{id_infcliente}',[informacionclientescontroller::class,'editar_infcliente'])->name('editar_infcliente');

Route::post('/updateinfcliente',[informacionclientescontroller::class,'updateinfcliente'])->name('updateinfcliente');
 


 /*Marca*/
Route::get('electronica_marca',[marcascontroller::class,'index'])->name('marca');
Route::post('electronica_guardarmarca',[marcascontroller::class,'guardarmarca'])->name('guardarmarca');
//Editar
Route::get('editar_marca/{id_marca}',[marcascontroller::class,'editar_marca'])->name('editar_marca');

Route::post('/updatemarca',[marcascontroller::class,'updatemarca'])->name('updatemarca');


//Desactivar
Route::post('desactivarmarca/{id_marca}',[marcascontroller::class,'desactivarmarca'])->name('desactivarmarca');
//Activacion
Route::post('activarmarca/{id_marca}',[marcascontroller::class,'activarmarca'])->name('activarmarca');
//Borrar
Route::post('borrarmarca/{id_marca}',[marcascontroller::class,'borrarmarca'])->name('borrarmarca');




 /*Producto-Categoria*/
Route::get('electronica_pcategoria',[productoscategoriascontroller::class,'index'])->name('pcategoria');
Route::post('electronica_guardarpcategoria',[productoscategoriascontroller::class,'guardarpcategoria'])->name('guardarpcategoria');
//Editar
Route::get('editar_pcategoria/{id_pcategoria}',[productoscategoriascontroller::class,'editar_pcategoria'])->name('editar_pcategoria');

Route::post('/updatepcategoria',[productoscategoriascontroller::class,'updatepcategoria'])->name('updatepcategoria');


//Desactivar
Route::post('desactivarpcategoria/{id_pcategoria}',[productoscategoriascontroller::class,'desactivarpcategoria'])->name('desactivarpcategoria');
//Activacion
Route::post('activarpcategoria/{id_pcategoria}',[productoscategoriascontroller::class,'activarpcategoria'])->name('activarpcategoria');
//Borrar
Route::post('borrarpcategoria/{id_pcategoria}',[productoscategoriascontroller::class,'borrarpcategoria'])->name('borrarpcategoria');


/*Departamentos*/
Route::get('electronica_departamento',[departamentoscontroller::class,'index'])->name('departamento');
Route::post('electronica_guardardepartamento',[departamentoscontroller::class,'guardardepartamento'])->name('guardardepartamento');
//Editar
Route::get('editar_departamento/{id_departamento}',[departamentoscontroller::class,'editar_departamento'])->name('editar_departamento');

Route::post('/updatedepartamento',[departamentoscontroller::class,'updatedepartamento'])->name('updatedepartamento');


//Desactivar
Route::post('desactivardepartamento/{id_departamento}',[departamentoscontroller::class,'desactivardepartamento'])->name('desactivardepartamento');
//Activacion
Route::post('activardepartamento/{id_departamento}',[departamentoscontroller::class,'activardepartamento'])->name('activardepartamento');
//Borrar
Route::post('borrardepartamento/{id_departamento}',[departamentoscontroller::class,'borrardepartamento'])->name('borrardepartamento');


/*Tipo-empleado*/
Route::get('electronica_templeado',[tipoempleadocontroller::class,'index'])->name('templeado');
Route::post('electronica_guardartempleado',[tipoempleadocontroller::class,'guardartempleado'])->name('guardartempleado');
//Editar
Route::get('editar_templeado/{id_tipo_empleado}',[tipoempleadocontroller::class,'editar_templeado'])->name('editar_templeado');

Route::post('/updatetempleado',[tipoempleadocontroller::class,'updatetempleado'])->name('updatetempleado');

 
//Desactivar
Route::post('desactivartempleado/{id_tipo_empleado}',[tipoempleadocontroller::class,'desactivartempleado'])->name('desactivartempleado');
//Activacion
Route::post('activartempleado/{id_tipo_empleado}',[tipoempleadocontroller::class,'activartempleado'])->name('activartempleado');
//Borrar
Route::post('borrartempleado/{id_tipo_empleado}',[tipoempleadocontroller::class,'borrartempleado'])->name('borrartempleado');




/*Empleado*/
Route::get('electronica_empleado',[empleadoscontroller::class,'index'])->name('electronica_empleado');




Route::get('registerempleado',[empleadoscontroller::class,'registerempleado'])->name('registerempleado');
Route::post('electronica_guardarempleado',[empleadoscontroller::class,'guardarempleado'])->name('guardarempleado');
//Editar
Route::get('editar_empleado/{id_empleado}',[empleadoscontroller::class,'editar_empleado'])->name('editar_empleado');

Route::post('/updateempleado',[empleadoscontroller::class,'updateempleado'])->name('updateempleado');


//Desactivar
Route::post('desactivarempleado/{id_empleado}',[empleadoscontroller::class,'desactivarempleado'])->name('desactivarempleado');
//Activacion
Route::post('activarempleado/{id_empleado}',[empleadoscontroller::class,'activarempleado'])->name('activarempleado');
//Borrar
Route::post('borrarempleado/{id_empleado}',[empleadoscontroller::class,'borrarempleado'])->name('borrarempleado');









/*Razons-social*/
Route::get('electronica_razons',[razonsocialcontroller::class,'index'])->name('razons');
Route::post('electronica_guardarrazons',[razonsocialcontroller::class,'guardarrazons'])->name('guardarrazons');
//Editar
Route::get('editar_razons/{id_razonsocial}',[razonsocialcontroller::class,'editar_razons'])->name('editar_razons');

Route::post('/updaterazons',[razonsocialcontroller::class,'updaterazons'])->name('updaterazons');


//Desactivar
Route::post('desactivarrazons/{id_razonsocial}',[razonsocialcontroller::class,'desactivarrazons'])->name('desactivarrazons');
//Activacion
Route::post('activarrazons/{id_razonsocial}',[razonsocialcontroller::class,'activarrazons'])->name('activarrazons');
//Borrar
Route::post('borrarrazons/{id_razonsocial}',[razonsocialcontroller::class,'borrarrazons'])->name('borrarrazons');






/*Proveedor*/
Route::get('electronica_proveedor',[proveedorescontroller::class,'index'])->name('electronica_proveedor');
Route::get('registerproveedor',[proveedorescontroller::class,'registerproveedor'])->name('registerproveedor');
Route::post('electronica_guardarproveedor',[proveedorescontroller::class,'guardarproveedor'])->name('guardarproveedor');
//Editar
Route::get('editar_proveedor/{id_proveedor}',[proveedorescontroller::class,'editar_proveedor'])->name('editar_proveedor');

Route::post('/updateproveedor',[proveedorescontroller::class,'updateproveedor'])->name('updateproveedor');


//Desactivar
Route::post('desactivarproveedor/{id_proveedor}',[proveedorescontroller::class,'desactivarproveedor'])->name('desactivarproveedor');
//Activacion
Route::post('activarproveedor/{id_proveedor}',[proveedorescontroller::class,'activarproveedor'])->name('activarproveedor');
//Borrar
Route::post('borrarproveedor/{id_proveedor}',[proveedorescontroller::class,'borrarproveedor'])->name('borrarproveedor');









/*Productos*/
Route::get('electronica_producto',[productoscontroller::class,'index'])->name('electronica_producto');
Route::get('registerproducto',[productoscontroller::class,'registerproducto'])->name('registerproducto');
Route::post('electronica_guardarproducto',[productoscontroller::class,'guardarproducto'])->name('guardarproducto');
//Editar
Route::get('editar_producto/{id_producto}',[productoscontroller::class,'editar_producto'])->name('editar_producto');

Route::post('/updateproducto',[productoscontroller::class,'updateproducto'])->name('updateproducto');


//Desactivar
Route::post('desactivarproducto/{id_producto}',[productoscontroller::class,'desactivarproducto'])->name('desactivarproducto');
//Activacion
Route::post('activarproducto/{id_producto}',[productoscontroller::class,'activarproducto'])->name('activarproducto');
//Borrar
Route::post('borrarproducto/{id_producto}',[productoscontroller::class,'borrarproducto'])->name('borrarproducto');








/*Tipo-factura*/
Route::get('electronica_tfactura',[tipofacturacontroller::class,'index'])->name('tfactura');
Route::post('electronica_guardartfactura',[tipofacturacontroller::class,'guardartfactura'])->name('guardartfactura');
//Editar
Route::get('editar_tfactura/{id_tipofactura}',[tipofacturacontroller::class,'editar_tfactura'])->name('editar_tfactura');

Route::post('/updatetfactura',[tipofacturacontroller::class,'updatetfactura'])->name('updatetfactura');


//Desactivar
Route::post('desactivartfactura/{id_tipofactura}',[tipofacturacontroller::class,'desactivartfactura'])->name('desactivartfactura');
//Activacion
Route::post('activartfactura/{id_tipofactura}',[tipofacturacontroller::class,'activartfactura'])->name('activartfactura');
//Borrar
Route::post('borrartfactura/{id_tipofactura}',[tipofacturacontroller::class,'borrartfactura'])->name('borrartfactura');



/*Venta*/
Route::get('electronica_venta',[ventacontroller::class,'index'])->name('venta');
Route::post('electronica_guardarventa',[ventacontroller::class,'guardarventa'])->name('guardarventa');
//Editar
Route::get('editar_venta/{id_venta}',[ventacontroller::class,'editar_venta'])->name('editar_venta');

Route::post('/updateventa',[ventacontroller::class,'updateventa'])->name('updateventa');


//Desactivar
Route::post('desactivarventa/{id_venta}',[ventacontroller::class,'desactivarventa'])->name('desactivarventa');
//Activacion
Route::post('activarventa/{id_venta}',[ventacontroller::class,'activarventa'])->name('activarventa');
//Borrar
Route::post('borrarventa/{id_venta}',[ventacontroller::class,'borrarventa'])->name('borrarventa');



/*Detalle-venta*/
Route::get('electronica_detventa',[detalleventacontroller::class,'index'])->name('detventa');
Route::post('electronica_guardardetventa',[detalleventacontroller::class,'guardardetventa'])->name('guardardetventa');
//Editar
Route::get('editar_detventa/{id_detalleventa}',[detalleventacontroller::class,'editar_detventa'])->name('editar_detventa');

Route::post('/updatedetventa',[detalleventacontroller::class,'updatedetventa'])->name('updatedetventa');


//Desactivar
Route::post('desactivardetventa/{id_detalleventa}',[detalleventacontroller::class,'desactivardetventa'])->name('desactivardetventa');
//Activacion
Route::post('activardetventa/{id_detalleventa}',[detalleventacontroller::class,'activardetventa'])->name('activardetventa');
//Borrar
Route::post('borrardetventa/{id_detalleventa}',[detalleventacontroller::class,'borrardetventa'])->name('borrardetventa');



/*Factura*/
Route::get('electronica_factura',[facturascontroller::class,'index'])->name('factura');
Route::post('electronica_guardarfactura',[facturascontroller::class,'guardarfactura'])->name('guardarfactura');
//Editar
Route::get('editar_factura/{id_factura}',[facturascontroller::class,'editar_factura'])->name('editar_factura');

Route::post('/updatefactura',[facturascontroller::class,'updatefactura'])->name('updatefactura');


//Desactivar
Route::post('desactivarfactura/{id_factura}',[facturascontroller::class,'desactivarfactura'])->name('desactivarfactura');
//Activacion
Route::post('activarfactura/{id_factura}',[facturascontroller::class,'activarfactura'])->name('activarfactura');
//Borrar
Route::post('borrarfactura/{id_factura}',[facturascontroller::class,'borrarfactura'])->name('borrarfactura');

});