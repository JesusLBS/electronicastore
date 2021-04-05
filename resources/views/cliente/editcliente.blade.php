@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>

<!------------------------------------------------------------*-----------------------------------------------------------> 
<br>
<div class="ejercicio-form">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <center>
                <div class="card-header" id="registrarse">Modificacion datos:</div>
              </center>
                <div class="card-body">
                  <form action = "{{route('updateinfcliente')}}" method = "POST" enctype="multipart/form-data">  
                    @method('POST') 
                    {{csrf_field()}} 
                    <div class="well">
                      <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="id_pcliente">Clave de registro de datos:
                     
                    </label>
                    <input type="text" name="id_infcliente" id="id_infcliente" value="{{$data['id_infcliente']}}" readonly="readonly" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nombre_cliente">Nombre:
                    <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('nombre_cliente'))
                      <p class="text-danger">{{$errors->first('nombre_cliente')}}</p>
                      @endif
                    </label>
                <input type="text" name="nombre_cliente" id="nombre_cliente"  value="{{$data['nombre_cliente']}}" class="form-control" placeholder="Nombre" tabindex="1">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="dni">Usuario:
                  
                </label>
                <select name = 'id' class="custom-select">
                  <option value="{{$data->id}}">{{$data->id}} {{$data->usuarios}}</option>
                  @foreach($users as $usuarios)
                  <option value="{{$usuarios->id}}">{{$usuarios->id}} {{$usuarios->name}}</option>
                  @endforeach
                </select>

                </div>
                <div class="form-group">
                    <label for="apellido_pcliente">Apellido Paterno:
                    <label for="apellido_pcliente" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('apellido_pcliente'))
                      <p class="text-danger">{{$errors->first('apellido_pcliente')}}</p>
                      @endif
                    </label>
                    <input type="text" name="apellido_pcliente" id="apellido_pcliente" value="{{$data['apellido_pcliente']}}" class="form-control" placeholder="Apellido Paterno" tabindex="2">
                </div>
            </div>


            
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="apellido_mcliente">Apellido Materno:
                    <label for="apellido_mcliente" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('apellido_mcliente'))
                      <p class="text-danger">{{$errors->first('apellido_mcliente')}}</p>
                      @endif
                    </label>
                    <input type="text" name="apellido_mcliente" id="apellido_mcliente" value="{{$data['apellido_mcliente']}}" class="form-control" placeholder="Apellido Materno" tabindex="2">
                </div>
            </div>
        </div>

        <div class="form-group">
                    <label for="apellido">Direccion:
                    <label for="direccion_cliente" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('direccion_cliente'))
                      <p class="text-danger">{{$errors->first('direccion_cliente')}}</p>
                      @endif
                    </label>
                    <input type="text" name="direccion_cliente" id="direccion_cliente" value="{{$data['direccion_cliente']}}" class="form-control" placeholder="Direccion" tabindex="2">
          </div> 

        <div class="form-group">
          <label for="dni">Departamento,suite,codigo de accseso (opc.):

          </label>
          <input type="text" name="departamento_cliente" id="departamento_cliente" value="{{$data['departamento_cliente']}}" class="form-control" tabindex="5">
        </div>
             <div class="form-group">
                
                  <label for="dni">Municipio:
                  
                </label> 
                <select name = 'id_municipio' class="custom-select">
                  <option value="{{$data->id_municipio}}"> {{$data->muni}}</option>
                  @foreach($municipios as $muni)
                  <option value="{{$muni->id_municipio}}">{{$muni->nombre_municipio}}</option>
                  @endforeach
                </select>
                
                
              </div>
 


        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="colonia_cliente">Colonia:
                      <label for="colonia_cliente" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('colonia_cliente'))
                      <p class="text-danger">{{$errors->first('colonia_cliente')}}</p>
                      @endif
                    </label>
                <input type="text" name="colonia_cliente" id="colonia_cliente"  value="{{$data['colonia_cliente']}}" class="form-control" placeholder="Colonia" tabindex="1">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="apellido">Ciudad:
                      <label for="ciudad_cliente" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('ciudad_cliente'))
                      <p class="text-danger">{{$errors->first('ciudad_cliente')}}</p>
                      @endif
                    </label>
                    <input type="text" name="ciudad_cliente" id="ciudad_cliente" value="{{$data['ciudad_cliente']}}" class="form-control" placeholder="Ciudad" tabindex="2">
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                <label for="dni">Seleccione Estado:
                  
                </label>
                <select name = 'id_estado' class="custom-select">
                  <option value="{{$data->id_estado}}">{{$data->est}}</option>
                  @foreach($estados as $est)
                  <option value="{{$est->id_estado}}">{{$est->nombre_estado}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="codigo_postalcliente">Codigo Postal:
                      <label for="codigo_postalcliente" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('codigo_postalcliente'))
                      <p class="text-danger">{{$errors->first('codigo_postalcliente')}}</p>
                      @endif
                    </label>
                    <input type="text" name="codigo_postalcliente" id="codigo_postalcliente" value="{{$data['codigo_postalcliente']}}" class="form-control" placeholder="Codigo Postal" tabindex="2">
                </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-7 form-group">
                <label for="sexo_cliente">Sexo:</label>
               
                @if($data->sexo_cliente=='F')
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo_cliente"  value="M" class="custom-control-input" >
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo_cliente" value="F" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>
                @else
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo_cliente"  value="M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo_cliente" value="F" class="custom-control-input">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>
                @endif


            </div>
            <div class="form-group">
                <label for="dni">Tipo de via:
                  
                </label>
                <select name = 'id_via' class="custom-select">
                  <option value="{{$data->id_via}}">{{$data->viat}}</option>
                  @foreach($vias as $viat)
                  <option value="{{$viat->id_via}}">{{$viat->tipo_via}}</option>
                  @endforeach
                </select>
              </div> 
        </div>
          

 <div class="sub-titulo">
          <b>Medios de comunicacion:</b>
          </div> 
          <hr>


        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="email">Email:
                      <label for="email_cliente" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('email_cliente'))
                      <p class="text-danger">{{$errors->first('email_cliente')}}</p>
                      @endif
                    </label>
                    <input type="email" name="email_cliente" id="email_cliente"  value="{{$data['email_cliente']}}" class="form-control" placeholder="Email" tabindex="4">
                    
                    Este email es Alernativo(puede ser el mismo de su cuenta de usuario o diferente)
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="celular_cliente">Celular:
                      <label for="celular_cliente" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('celular_cliente'))
                      <p class="text-danger">{{$errors->first('celular_cliente')}}</p>
                      @endif
                    </label>
                    <input type="text" name="celular_cliente" id="celular_cliente" value="{{$data['celular_cliente']}}"  class="form-control" placeholder="Celular" tabindex="3">
                    <i class="fas fa-mobile-alt"></i>
                </div>
            </div>

        </div>
        <div class="form-group">
            <label for="dni">Referencia (opc.):</label>
            <textarea name="referencia_cliente" id="referencia_cliente" class="form-control"   tabindex="5">
              {{$data['referencia_cliente']}}
            </textarea>
        </div>
        <hr>            
                        
                        <div class="form-group row mb-0 ">
                            <div class="col-md-6 offset-md-4 ">
                                <button type="submit" class="btn btn-outline-primary">
                                     Actualizar
                                </button> 
                                <a href="{{route('cliente')}}">
                                <button type="button" class="btn btn-outline-danger font-weight-bold">Regresar
                                </button>
                            </div>
                        </div>

        
</form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>





<!------------------------------------------------------------------------------------------------------------------>








<!------------------------------------------------------------------------------------------------------------------>
@stop