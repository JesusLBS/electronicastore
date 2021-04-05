@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>


      
<div class="content-form">

<div class=" row col-md-13">
            <div class="card" id="card-form">
              <center>
                <div class="card-header" id="registrarse">Forma de pago</div>
              </center>
                <div class="card-body">
                    <form action = "{{route('updateformpago')}}" method = "POST">  
                    @method('POST')
                    {{csrf_field()}} 
                      
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_forma_pago" type="text" class="form-control" value="{{$data['id_forma_pago']}}" readonly="readonly" name="id_forma_pago"  required autocomplete="id_forma_pago" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Descripción:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " value="{{$data['forma_pago']}}" name="forma_pago" required autocomplete="name" autofocus>
                                @if($errors->first('forma_pago'))
                            <p class="text-danger">{{$errors->first('forma_pago')}}</p>
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
                                <input type="button" class="btn btn-outline-danger"  value="Regresar" name="Back2" onclick="history.back()"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<br>

<!------------------------------------------------------------------------------------------------------------------>
@stop