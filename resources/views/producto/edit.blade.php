@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>

<div class="titulo-reporte">
    <h1>Productos</h1>
</div> 





<div class="content-agregar">
  <a href="{{route('electronica_producto')}}">
    <button type="button" class="btn btn-outline-danger font-weight-bold">Regresar
    </button>
  </a>
</div>


  

<!------------------------------------------------------------------------------------------------------------------>

<br>
<div class="ejercicio-form"> 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <center>
                <div class="card-header" id="registrarse">Modificacion Productos:</div>
              </center>
                <div class="card-body">
              <form action = "{{route('updateproducto')}}" method = "POST" enctype="multipart/form-data">  
                    {{csrf_field()}}  
                 
                <div class="pl-lg-4">

                  <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Foto del  Producto:</label>
                                                   

                            <div class="col-md-6">
               
                            <img class="imgpr rounded" style="width: 34%; " src="{{asset('archivos/'.$data->imgpr)}}" name="imgpr">  
                            </div>
                        </div>

                  <div class="row">
                     
                  <div class="col-lg-6">
                      <div class="form-group">
                    <label for="id_producto">Clave :
                     
                    </label>
                    <input type="text" name="id_producto" id="id_producto" value="{{$data['id_producto']}}" readonly="readonly" class="form-control">
                </div>
                    </div>
                    
                    </div>
 
                  </div>
 
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="nombre_producto">Nombre:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="nombre_producto" class="form-control"  name="nombre_producto" value="{{$data['nombre_producto']}}">
                            @if($errors->first('nombre_producto'))
                            <p class="text-danger">{{$errors->first('nombre_producto')}}</p>
                            @endif
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="descripcion_producto">Descripcion:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="descripcion_producto" class="form-control"  name="descripcion_producto" value="{{$data['descripcion_producto']}}">
                        @if($errors->first('descripcion_producto'))
                        <p class="text-danger">{{$errors->first('descripcion_producto')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="numserie_producto">Numero de serie:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="numserie_producto" class="form-control"  name="numserie_producto" value="{{$data['numserie_producto']}}">
                        @if($errors->first('numserie_producto'))
                        <p class="text-danger">{{$errors->first('numserie_producto')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="preciocompra_producto">Precio Compra:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('preciocompra_producto'))
                      <p class="text-danger">{{$errors->first('preciocompra_producto')}}</p>
                      @endif
                    </label>$
                    <input type="text" name="preciocompra_producto" id="preciocompra_producto"  class="form-control" value="{{$data['preciocompra_producto']}}">
                </div>
            </div>



            <div class="col-lg-6">
                <div class="form-group">
                    <label for="precioventa_producto">Precio Venta:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('precioventa_producto'))
                      <p class="text-danger">{{$errors->first('precioventa_producto')}}</p>
                      @endif
                    </label>$
                    <input type="text" name="precioventa_producto" id="precioventa_producto"   class="form-control" value="{{$data['precioventa_producto']}}">
                </div>
            </div>
             

            <div class="col-xs-6 col-sm-6 col-md-6 form-group">
                <label for="garantiatienda_producto">Garantia en tienda:</label>
                @if($data->garantiatienda_producto=='No')
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="garantiatienda_producto"  value="Si" class="custom-control-input" >
                <label class="custom-control-label" for="sexo1">Si</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="garantiatienda_producto" value="No" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo2">No</label>
                </div>
                @else
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="garantiatienda_producto"  value="Si" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Si</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="garantiatienda_producto" value="No" class="custom-control-input">
                <label class="custom-control-label" for="sexo2">No</label>
                </div>
                @endif
            </div>
          </div>
                </div>

                <hr class="my-4" />
                <!-- Address -->
                <div class="pl-lg-4">
                  
                  <div class="row">
                    <div class="col-lg-4">
                <div class="form-group">
                <label for="dni">Seleccione Marca:</label>
                <select name = 'id_marca' class="custom-select">
                  <option value="{{$data->id_marca}}">{{$data->marc}}</option>
                  @foreach($marcas as $marc)
                  <option value="{{$marc->id_marca}}">{{$marc->nombre_marca}}</option>
                  @endforeach
                </select>
              </div>
            </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                <label for="dni">Seleccione Proveedor:</label>

                <select name = 'id_proveedor' class="custom-select">
                  <option value="{{$data->id_proveedor}}">{{$data->prov}}</option>
                  @foreach($proveedores as $prov)
                  <option value="{{$prov->id_proveedor}}">{{$prov->nombre_proveedor}}</option>
                  @endforeach
                </select>


              </div>
                    </div>
                  </div> 
                </div>





                <div class="pl-lg-4">
                  
                <div class="row">
                <div class="col-lg-7">
                      <div class="form-group"> 
                        <label for="dni">Seleccione Categoria del Producto:</label>
                        <select name = 'id_pcategoria' class="custom-select">
                         <option value="{{$data->id_pcategoria}}">{{$data->pcatego}}</option>
                         @foreach($productcategorias as $pcatego)
                         <option value="{{$pcatego->id_pcategoria}}">{{$pcatego->nombre_pcategoria}}</option>
                         @endforeach
                       </select>
                
                      </div>
                    </div>
                    </div>
                    </div>


                <div class="pl-lg-4">
                  
                <div class="row">
                <div class="col-lg-7">
                <div class="form-group">
                    <label for="imgpr">Actualizar Foto producto:
                      @if($errors->first('imgpr'))
                      <p class="text-danger">{{$errors->first('imgpr')}}</p>
                      @endif
                    </label>
                    <input type="file" name="imgpr" id="imgpr" class="form-control" tabindex="">
                </div>
                </div>
                </div>
                </div>



                <hr class="my-4" />
                <!-- Description -->
                
                <div class="form-group row mb-0 ">
                            <div class="col-md-6 offset-md-4 ">
                                
                                <input type="submit" class="btn btn-outline-primary font-weight-bold"  value="Guardar"/>
                            </div>
                        </div>
                <div class="content-agregar">
  <a href="{{route('electronica_producto')}}">
    <button type="button" class="btn btn-outline-danger font-weight-bold">Regresar
    </button>
  </a>
</div>
                
              </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<br>
<br>

<br>
<br>
<br>
<br><br>


<!------------------------------------------------------------------------------------------------------------------>
@stop