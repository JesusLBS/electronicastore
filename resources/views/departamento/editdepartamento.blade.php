@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>




<div class="content">
                <div class="animated fadeIn" style=" margin-left: 15%; margin-right: 8%;">


                <div class="row">
                <div class="col-lg-11">
                        <div class="card">
                            <div class="card-header text-center">
                                <strong class="card-title">Modificacion Departamento</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">{{$datadepartamento['nombre_departamento']}}</h3>
                                        </div>
                                        <hr>
                                         <form action = "{{route('updatedepartamento')}}" method = "POST" >
                    @method('POST')  
                    {{csrf_field()}}    
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave Municipio:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_departamento" type="text" class="form-control" value="{{$datadepartamento['id_departamento']}}" readonly="readonly" name="id_departamento"  required autocomplete="id_departamento" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre Estado:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="nombre_departamento" type="text" class="form-control" value="{{$datadepartamento['nombre_departamento']}}" name="nombre_departamento"  required autocomplete="name" autofocus>
                            @if($errors->first('nombre_departamento'))
                            <p class="text-danger">{{$errors->first('nombre_departamento')}}</p>
                            @endif
                            </div>
                            

                        </div>

        

 
<br>
<br>
<br>
<br>
              
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                     Actualizar
                                </button>
                                <a href="{{route('razons')}}">
                                <button type="button" class="btn btn-outline-danger font-weight-bold">Regresar
                                </button>
                               </a>
                            </div>
                        </div>
                    </form> 
                                    </div>
                                </div>
 </div>
                                </div>
                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->
    </div><!-- .content -->


 
<!----------------------------------------------------------------------------------------------->

@stop