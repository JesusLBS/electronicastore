@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>




 
<div class="content-agregar">
  <a href="{{route('electronica_proveedor')}}">
    <button type="button" class="btn btn-outline-danger font-weight-bold">Regresar
    </button>
  </a>
</div> 
 
<!------------------------------------------------------------------------------------------------------------------>

 
<div class="ejercicio-form">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <center>
                <div class="card-header" id="Edicion">Edicion datos:</div>
              </center>
                <div class="card-body">
              <form action = "{{route('updateproveedor')}}" method = "POST" enctype="multipart/form-data">  
                    {{csrf_field()}}  
                
                <div class="pl-lg-4">

                  <div class="row"> 
                    
                  <div class="col-lg-6">
                      <div class="form-group">
                    <label for="id_proveedor">Clave :
                     
                    </label>
                    <input type="text" name="id_proveedor" id="id_proveedor" value="{{$data['id_proveedor']}}" readonly="readonly" class="form-control">
                </div>
                    </div>
                    
                    </div>
 
                  </div>
 
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="nombre_proveedor">Nombre Proveedor:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="nombre_proveedor" class="form-control" name="nombre_proveedor" value="{{$data['nombre_proveedor']}}">
                            @if($errors->first('nombre_proveedor'))
                            <p class="text-danger">{{$errors->first('nombre_proveedor')}}</p>
                            @endif
                      </div>
                    </div> 
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="rfc_proveedor">RFC:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="rfc_proveedor" class="form-control" name="rfc_proveedor" value="{{$data['rfc_proveedor']}}">
                        @if($errors->first('rfc_proveedor'))
                        <p class="text-danger">{{$errors->first('rfc_proveedor')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>
                  
                 
                </div>

                <hr class="my-4" />
                <!-- Address -->
                
                <div class="pl-lg-4">
                  <h6 class="heading-small text-muted mb-4">Informacin de contacto</h6>
                	 <div class="row">
 
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email_proveedor">Email Proveedor:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('email_proveedor'))
                      <p class="text-danger">{{$errors->first('email_proveedor')}}</p>
                      @endif
                    </label>
                    <input type="email" name="email_proveedor" id="email_proveedor" value="{{$data['email_proveedor']}}" class="form-control" tabindex="">
                    
                    
                    Este email debe ser el mas usado por el proveedor para comunicarse.
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="celular_proveedor">Celular del Proveedor:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('celular_proveedor'))
                      <p class="text-danger">{{$errors->first('celular_proveedor')}}</p>
                      @endif
                    </label>
                    <input type="text" name="celular_proveedor" id="celular_proveedor" value="{{$data['celular_proveedor']}}"  class="form-control"  tabindex="3">
                    
                </div>
            </div>
            

        </div> 
                  
                  <div class="row">
                    <div class="col-lg-6">
                <div class="form-group">
                <label for="dni">Seleccione T. Razon Social:</label>
                <select name = 'id_razonsocial' class="custom-select">
                  <option value="{{$data->id_razonsocial}}"> {{$data->razon}}</option>
                  @foreach($razonsocials as $razon)
                  <option value="{{$razon->id_razonsocial}}">{{$razon->tipo_razonsocial}}</option>
                  @endforeach
                </select>


              </div>
            </div>
                    
                  </div> 
                  <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-6">
                <div class="form-group">
                    <label for="tipopersona_proveedor">Tipo de Proveedor:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      
                    </label>
                    <input type="text" name="tipopersona_proveedor" id="tipopersona_proveedor"  value="{{$data['tipopersona_proveedor']}}" class="form-control" placeholder="Tipo de Proveedor" tabindex="">
                    @if($errors->first('tipopersona_proveedor'))
                    <p class="text-danger">{{$errors->first('tipopersona_proveedor')}}</p>
                    @endif
                </div>
            </div>
                  </div>


                </div>
                <hr class="my-4" />
                <!-- Description -->
                
                
                <div class="form-group row mb-0 ">
                            <div class="col-md-6 offset-md-4 ">
                                
                                <input type="submit" class="btn btn-outline-primary font-weight-bold"  value="ACTUALIZAR"/>
                            </div>
                        </div>
                <div class="content-agregar"> 
  <a href="{{route('electronica_proveedor')}}">
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