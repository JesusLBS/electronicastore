@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>
<div class="titulo-reporte">
    <h1>Empleados</h1>
</div> 





<div class="content-agregar">
  <a href="{{route('electronica_empleado')}}">
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
                <div class="card-header" id="registrarse">Registro Empleados:</div>
              </center>
                <div class="card-body">
              <form action = "{{route('guardarempleado')}}" method = "POST" enctype="multipart/form-data">  
                    {{csrf_field()}}  
                
                <div class="pl-lg-4">

                  <div class="row">
                    
                  <div class="col-lg-6">
                      <div class="form-group">
                    <label for="id_empleado">Clave :
                     
                    </label>
                    <input type="text" name="id_empleado" id="id_empleado" value="{{$id_sigue}}" readonly="readonly" class="form-control">
                </div>
                    </div>
                    
                    </div>
 
                  </div>
 
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="nombre_empleado">Nombre:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="nombre_empleado" class="form-control" placeholder="Ingrese Nombre" name="nombre_empleado" value="{{old('nombre_empleado')}}">
                            @if($errors->first('nombre_empleado'))
                            <p class="text-danger">{{$errors->first('nombre_empleado')}}</p>
                            @endif
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="apellido_pempleado">Apellido Paterno:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="apellido_pempleado" class="form-control" placeholder="Apellido Paterno" name="apellido_pempleado" value="{{old('apellido_pempleado')}}">
                        @if($errors->first('apellido_pempleado'))
                        <p class="text-danger">{{$errors->first('apellido_pempleado')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="apellido_mempleado">Apellido Materno:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="apellido_mempleado" class="form-control" placeholder="Apellido Materno" name="apellido_mempleado" value="{{old('apellido_mempleado')}}">
                        @if($errors->first('apellido_mempleado'))
                        <p class="text-danger">{{$errors->first('apellido_mempleado')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email_empleado">Email:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('email_empleado'))
                      <p class="text-danger">{{$errors->first('email_empleado')}}</p>
                      @endif
                    </label>
                    <input type="email" name="email_empleado" id="email_empleado" value="{{old('email_empleado')}}" class="form-control" placeholder="Email" tabindex="4">
                    
                    <i class="far fa-envelope"></i>
                    Este email es Alernativo(puede ser el mismo de su cuenta de usuario o diferente)
                </div>
            </div> 

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="celular_empleado">Celular:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('celular_empleado'))
                      <p class="text-danger">{{$errors->first('celular_empleado')}}</p>
                      @endif
                    </label>
                    <input type="text" name="celular_empleado" id="celular_empleado" value="{{old('celular_empleado')}}"  class="form-control" placeholder="Celular" tabindex="3">
                    <i class="fas fa-mobile-alt"></i>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 form-group">
                <label for="sexo_empleado">Sexo:</label>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo_empleado"  value = "M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo_empleado" value = "F" class="custom-control-input">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>
            </div>

        </div>
                </div>

                <hr class="my-4" />
                <!-- Address -->
                
                <div class="pl-lg-4">
                  <h6 class="heading-small text-muted mb-4">Informacin de contacto</h6>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        
                        <label for="calle_empleado">Calle:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input id="calle_empleado" class="form-control" placeholder="Ingrese Calle"  name="calle_empleado" value="{{old('calle_empleado')}}" type="text">
                        @if($errors->first('calle_empleado'))
                        <p class="text-danger">{{$errors->first('calle_empleado')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                <div class="form-group">
                <label for="dni">Seleccione Estado:</label>
                <select name = 'id_estado' class="custom-select">
                  <option selected=""></option>
                  @foreach($estados as $est)
                  <option value="{{$est->id_estado}}">{{$est->nombre_estado}}</option>
                  @endforeach
                </select>
              </div>
            </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                <label for="dni">Seleccione Municipio:</label>
                 @if($errors->first('id_municipio'))
                        <p class="text-danger">{{$errors->first('id_municipio')}}</p>
                        @endif
                <select id="id_municipio" name = 'id_municipio' class="custom-select">
                  <option selected=""></option>
                  @foreach($municipios as $muni)
                  <option value="{{$muni->id_municipio}}">{{$muni->nombre_municipio}}</option>
                  @endforeach
                </select>
              </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="dni">Seleccione Departamento:</label>
                <select name = 'id_departamento' class="custom-select">
                  <option selected=""></option>
                  @foreach($departamentos as $depa)
                  <option value="{{$depa->id_departamento}}">{{$depa->nombre_departamento}}</option>
                  @endforeach
                </select>
                
                      </div>
                    </div>

                    <div class="col-lg-4">
                <div class="form-group">
                <label for="dni">Seleccione Tipo de empleado:</label>
                <select name = 'id_tipo_empleado' class="custom-select">
                  <option selected=""></option>
                  @foreach($tipoempleados as $tipemple)
                  <option value="{{$tipemple->id_tipo_empleado}}">{{$tipemple->nombre_tipoempleado}}</option>
                  @endforeach
                </select>
              </div>
            </div>
                  </div> 
                  <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <label for="codigo_postalempleado">Codigo Postal:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      
                    </label>
                    <input type="text" name="codigo_postalempleado" id="codigo_postalempleado"  value="{{old('codigo_postalempleado')}}" class="form-control" placeholder="Codigo Postal" tabindex="">
                    @if($errors->first('codigo_postalempleado'))
                    <p class="text-danger">{{$errors->first('codigo_postalempleado')}}</p>
                    @endif
                </div>
            </div>
                  </div>


                </div>
                <hr class="my-4" />
                <!-- Description -->
                
                <div class="pl-lg-4">
                  <h6 class="heading-small text-muted mb-4">Archivo</h6>
                  <div class="form-group">
                    <label class="form-control-label">Contrato PDF</label>
                      @if($errors->first('contratopdf'))
                      <p class="text-danger">{{$errors->first('contratopdf')}}</p>
                      @endif
                    <input type="file" name="contratopdf" id="contratopdf">

                  </div>
                </div>
                <div class="form-group row mb-0 ">
                            <div class="col-md-6 offset-md-4 ">
                                
                                <input type="submit" class="btn btn-outline-primary font-weight-bold"  value="Guardar"/>
                            </div>
                        </div>
                <div class="content-agregar">
  <a href="{{route('electronica_empleado')}}">
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