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
                                <strong class="card-title">Modificacion Tipo de pcategoria</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">{{$datapcatego['descripcion_pcategoria']}}</h3>
                                        </div>
                                        <hr>
                                         <form action = "{{route('updatepcategoria')}}" method = "POST" >
                                          @method('POST')  
                                          {{csrf_field()}}  
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_pcategoria" type="text" class="form-control" value="{{$datapcatego['id_pcategoria']}}" readonly="readonly" name="id_pcategoria"  required autocomplete="id_pcategoria" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Categoria:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="nombre_pcategoria" type="text" class="form-control" value="{{$datapcatego['nombre_pcategoria']}}" name="nombre_pcategoria"  required autocomplete="name" autofocus>
                            @if($errors->first('nombre_pcategoria'))
                            <p class="text-danger">{{$errors->first('nombre_pcategoria')}}</p>
                            @endif
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="descripcion_pcategoria" type="text" class="form-control" value="{{$datapcatego['descripcion_pcategoria']}}" name="descripcion_pcategoria"  required autocomplete="name" autofocus>
                            @if($errors->first('descripcion_pcategoria'))
                            <p class="text-danger">{{$errors->first('descripcion_pcategoria')}}</p>
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
                                <a href="{{route('pcategoria')}}">
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