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
                                <strong class="card-title">Modificacion Marca</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">{{$datamarca['nombre_marca']}}</h3>
                                        </div>
                                        <hr>
                                       <form action = "{{route('updatemarca')}}" method = "POST" >
                    @method('POST')  
                    {{csrf_field()}}                    
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_marca" type="text" class="form-control" value="{{$datamarca['id_marca']}}" readonly="readonly" name="id_marca"  required autocomplete="id_marca" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre Marca:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="nombre_marca" type="text" class="form-control" value="{{$datamarca['nombre_marca']}}" name="nombre_marca"  required autocomplete="name" autofocus>
                            @if($errors->first('nombre_marca'))
                            <p class="text-danger">{{$errors->first('nombre_marca')}}</p>
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
                                <a href="{{route('marca')}}">
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

