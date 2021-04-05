@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>

      <!----------------------------------------------------------------------------------------------->
      
<div class="content-form">

<div class=" row col-md-13">
            <div class="card" id="card-form">
              <center>
                <div class="card-header" id="registrarse">Moneda</div>
              </center>
                <div class="card-body">
                    <form action = "{{route('updatemoneda')}}" method = "POST" >
                    @method('POST')  
                    {{csrf_field()}}                    
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave Moneda:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_moneda" type="text" class="form-control" value="{{$data['id_moneda']}}" readonly="readonly" name="id_moneda"  required autocomplete="id_moneda" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Moneda:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="tipo_moneda" type="text" class="form-control" value="{{$data['tipo_moneda']}}" name="tipo_moneda"  required autocomplete="name" autofocus>
                            @if($errors->first('tipo_moneda'))
                            <p class="text-danger">{{$errors->first('tipo_moneda')}}</p>
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



<!------------------------------------------------------------------------------------------------------------------>
@stop