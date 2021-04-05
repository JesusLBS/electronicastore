@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>





<div class="titulo-reporte">
    <h1>Proveedor</h1>
</div> 








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
                <div class="card-header" id="registrarse">Ingrese datos:</div>
              </center>
                <div class="card-body">
              <form action = "{{route('guardarproveedor')}}" method = "POST" enctype="multipart/form-data">  
                    {{csrf_field()}}  
                
                <div class="pl-lg-4">

                  <div class="row"> 
                    
                  <div class="col-lg-6">
                      <div class="form-group">
                    <label for="id_proveedor">Clave :
                     
                    </label>
                    <input type="text" name="id_proveedor" id="id_proveedor" value="{{$id_sigue}}" readonly="readonly" class="form-control">
                </div>
                    </div>
                    
                    </div>
 
                  </div>
 
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="nombre_proveedor">Nombre Proveedor:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="nombre_proveedor" class="form-control" placeholder="Ingrese Nombre de Proveedor" name="nombre_proveedor" value="{{old('nombre_proveedor')}}">
                            @if($errors->first('nombre_proveedor'))
                            <p class="text-danger">{{$errors->first('nombre_proveedor')}}</p>
                            @endif
                      </div>
                    </div> 
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="rfc_proveedor">RFC:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="rfc_proveedor" class="form-control" placeholder="Ingrese RFC" name="rfc_proveedor" value="{{old('rfc_proveedor')}}">
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
                  <h6 class="heading-small text-muted mb-4">Informacion de contacto</h6>
          <div class="row">
 
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email_proveedor">Email Proveedor:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('email_proveedor'))
                      <p class="text-danger">{{$errors->first('email_proveedor')}}</p>
                      @endif
                    </label>
                    <input type="email" name="email_proveedor" id="email_proveedor" value="{{old('email_proveedor')}}" class="form-control" placeholder="Email" tabindex="4">
                    
                    
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
                    <input type="text" name="celular_proveedor" id="celular_proveedor" value="{{old('celular_proveedor')}}"  class="form-control" placeholder="Celular" tabindex="3">
                    <i class="fas fa-mobile-alt"></i>
                </div>
            </div>
            

        </div>
                  
                  <div class="row">
                    <div class="col-lg-6">
                <div class="form-group">
                <label for="dni">Seleccione T. Razon Social:</label>
                <select name = 'id_razonsocial' class="custom-select">
                  <option selected=""></option>
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
                    <input type="text" name="tipopersona_proveedor" id="tipopersona_proveedor"  value="{{old('tipopersona_proveedor')}}" class="form-control" placeholder="Tipo de Proveedor" tabindex="">
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
                                
                                <input type="submit" class="btn btn-outline-primary font-weight-bold"  value="Guardar"/>
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