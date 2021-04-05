@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>

<!----------------------------------------------------------------------------------------------->
      








<div class="content">
                <div class="animated fadeIn" style=" margin-left: 15%; margin-right: 8%;">


                <div class="row">
                <div class="col-lg-11">
                        <div class="card">
                            <div class="card-header text-center">
                                <strong class="card-title">Modificacion Tipo de via</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">{{$datavia['descripcion_via']}}</h3>
                                        </div>
                                        <hr>
                                         <form action = "{{route('updatevia')}}" method = "POST" >
                                          @method('POST')  
                                          {{csrf_field()}}  
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_via" type="text" class="form-control" value="{{$datavia['id_via']}}" readonly="readonly" name="id_via"  required autocomplete="id_via" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tipo Via:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="tipo_via" type="text" class="form-control" value="{{$datavia['tipo_via']}}" name="tipo_via"  required autocomplete="name" autofocus>
                            @if($errors->first('tipo_via'))
                            <p class="text-danger">{{$errors->first('tipo_via')}}</p>
                            @endif
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="descripcion_via" type="text" class="form-control" value="{{$datavia['descripcion_via']}}" name="descripcion_via"  required autocomplete="name" autofocus>
                            @if($errors->first('descripcion_via'))
                            <p class="text-danger">{{$errors->first('descripcion_via')}}</p>
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
                                <a href="{{route('via')}}">
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


<!------------------------------------------------------------------------------------------------------------------>
@stop














