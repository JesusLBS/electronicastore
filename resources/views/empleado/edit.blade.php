@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>

 
<!------------------------------------------------------------------------------------------------------------------>

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
                <div class="card-header" id="registrarse">Modificacion datos:</div>
              </center>
                <div class="card-body">
              <form action = "{{route('updateempleado')}}" method = "POST" enctype="multipart/form-data">  
                    {{csrf_field()}}  
                
                <div class="pl-lg-4"> 

                	<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Contrato:</label>
                            <div class="col-md-6">

                            @if($data->contratopdf=='Sin contrato')  
                            <p>No se Adjunto contrato</p>
                            @else
                             <a href="{{asset('archivos/'.$data->contratopdf)}}"> 
                                  <button type="button" class="btn btn-outline-danger font-weight-bold"><i class="fas fa-file-pdf"></i>PDF</button>
                                </a>
                            @endif 


                           

                         

                            
                                        
                              
                            </div>
                        </div>
                  <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                    <label for="id_empleado">Clave :
                     
                    </label>
                    <input type="text" name="id_empleado" id="id_empleado" value="{{$data['id_empleado']}}" readonly="readonly" class="form-control">
                </div>
                    </div>
                    </div>
                  </div>
 
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="nombre_empleado">Nombre:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="nombre_empleado" class="form-control" name="nombre_empleado" value="{{$data['nombre_empleado']}}">
                            @if($errors->first('nombre_empleado'))
                            <p class="text-danger">{{$errors->first('nombre_empleado')}}</p>
                            @endif
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="apellido_pempleado">Apellido Paterno:</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="apellido_pempleado" class="form-control"  name="apellido_pempleado" value="{{$data['apellido_pempleado']}}">
                        @if($errors->first('apellido_pempleado'))
                        <p class="text-danger">{{$errors->first('apellido_pempleado')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="apellido_mempleado">Apellido Materno::</label>
                        <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                        <input type="text" id="apellido_mempleado" class="form-control"  name="apellido_mempleado" value="{{$data['apellido_mempleado']}}">
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
                    <input type="email" name="email_empleado" id="email_empleado" value="{{$data['email_empleado']}}" class="form-control"  tabindex="">
                    
                    <i class="far fa-envelope"></i>
                    Este email es Alernativo(puede ser el mismo de su cuenta de usuario o diferente)
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="celular_empleado">Telefono:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('celular_empleado'))
                      <p class="text-danger">{{$errors->first('celular_empleado')}}</p>
                      @endif
                    </label>
                    <input type="text" name="celular_empleado" id="celular_empleado" value="{{$data['celular_empleado']}}"  class="form-control"  tabindex="3">
                    <i class="fas fa-mobile-alt"></i>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 form-group">
                <label for="sexo_empleado">Sexo:</label>
                @if($data->sexo_empleado=='F')
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo_empleado"  value="M" class="custom-control-input" >
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo_empleado" value="F" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>
                @else
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo_empleado"  value="M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo_empleado" value="F" class="custom-control-input">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>
                @endif
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
                        <input id="calle_empleado" class="form-control"  name="calle_empleado"  value="{{$data['calle_empleado']}}" type="text">
                        @if($errors->first('calle_empleado'))
                        <p class="text-danger">{{$errors->first('calle_empleado')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
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
                    <div class="col-lg-4">
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
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                
                  <label for="dni">Seleccione Departmento:
                  
                </label> 
                <select name = 'id_departamento' class="custom-select">
                  <option value="{{$data->id_departamento}}"> {{$data->depa}}</option>
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
                  <option value="{{$data->id_tipo_empleado}}"> {{$data->temple}}</option>
                  @foreach($tipoempleados as $temple)
                  <option value="{{$temple->id_tipo_empleado}}">{{$temple->nombre_tipoempleado}}</option>
                  @endforeach
                </select>
              </div>
            </div>
                  </div> 
                  <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-4">
                <div class="form-group">
                    <label for="codigo_postalempleado">Codigo Postal:
                      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      
                    </label>
                    <input type="text" name="codigo_postalempleado" id="codigo_postalempleado"  value="{{$data['codigo_postalempleado']}}" class="form-control" tabindex="">
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
                    <label class="form-control-label">Actualizar Contrato PDF</label>
                      @if($errors->first('contratopdf')) 
                      <p class="text-danger">{{$errors->first('contratopdf')}}</p>
                      @endif
                    
                    <input type="file" name="contratopdf" id="contratopdf" class="form-control" tabindex="">

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