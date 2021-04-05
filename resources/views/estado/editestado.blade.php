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
                                <strong class="card-title">Modificacion Usuario</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">{{$dataest['nombre_estado']}}</h3>
                                        </div>
                                        <hr>
                                       <form action = "{{route('estado.update')}}" method = "POST" >
                    @method('POST')  
                    {{csrf_field()}}                    
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave estado:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_estado" type="text" class="form-control" value="{{$dataest['id_estado']}}" readonly="readonly" name="id_estado"  required autocomplete="id_estado" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre Estado:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="nombre_estado" type="text" class="form-control" value="{{$dataest['nombre_estado']}}" name="nombre_estado"  required autocomplete="name" autofocus>
                            @if($errors->first('nombre_estado'))
                            <p class="text-danger">{{$errors->first('nombre_estado')}}</p>
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
                                <a href="{{route('estado')}}">
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
                        </div> <!-- .card -->

                    </div><!--/.col-->
    </div><!-- .content -->




<!------------------------------------------------------------------------------------------------------------------>
@stop