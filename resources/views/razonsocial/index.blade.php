@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>
<div class="titulo-reporte">
    <h1>Tipo Razon Social</h1>
</div>
<!-------------------------------------------------- Boton Agregar Modal ---------------------------------------------------------------->
<div class="content-agregar">
    <!-- Large modal -->
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar</button>
</div>


<!-------------------------------------------------- Formulariio Boton Agregar Modal ---------------------------------------------------------------->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!----------------------------------------------------------------------------------------------->
      
<div class="content-form">

<div class=" row col-md-13">
            <div class="card" id="card-form">
              <center>
                <div class="card-header" id="Razon Social">Registro de Razon Social</div>
              </center>
                <div class="card-body">
                    <form action = "{{route('guardarrazons')}}" method = "POST">  
                    {{csrf_field()}}                    
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_razonsocialocial" type="text" class="form-control" value="{{$id_sigue}}" readonly="readonly" name="id_razonsocialocial"   autocomplete="id_razonsocialocial" autofocus disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tipo Razon Social:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="tipo_razonsocial" type="text" class="form-control" value="{{old('tipo_razonsocial')}}" name="tipo_razonsocial" placeholder="Escriba el tipo de razon social"   autocomplete="name" autofocus>
                            @if($errors->first('tipo_razonsocial'))
                            <p class="text-danger">{{$errors->first('tipo_razonsocial')}}</p>
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
                                     Registrar
                                </button> 
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<br>

      <!----------------------------------------------------------------------------------------------->

    </div>
  </div>

<!-------------------------------------------------- Mensaje ---------------------------------------------------------------->



<!--------------------------------------------------*---------------------------------------------------------------->

<!-------------------------------------------------- Tabla de Consulta(Reporte) ---------------------------------------------------------------->

 <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <center><h3 class="mb-0"> Tipo de Razon Social</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th>Razon</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($consulta2 as $razons)
                  <tr>
                    
                    <td class="budget">
                       {{$razons->id_razonsocial}}
                    </td>
                    <td>
                     {{$razons->tipo_razonsocial}}
                    </td>
                    
                    <td>
                    @if(auth()->user()->id_rol == 1 )
                      @if($razons->deleted_at)
                        <form id="activarrazons" action="{{route('activarrazons',['id_razonsocial'=>$razons->id_razonsocial])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-success">Activar</button>
                        </form>
                        <form id="borrarrazons" action="{{route('borrarrazons',['id_razonsocial'=>$razons->id_razonsocial])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-danger">
                                                      <span class="" title="Eliminar">Eliminar</span>
                                                    </button>
                        </form>
                        @else
                         <form id="desactivarrazons" action="{{route('desactivarrazons',['id_razonsocial'=>$razons->id_razonsocial])}}" method="POST" enctype="multipart/form-data"> 
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-warning">Desactivar</button>
                        </form> 


                        @endif 
                         <a href="{{route('editar_razons',['id_razonsocial'=>$razons->id_razonsocial])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                         </a>
                     @else
                      @if(auth()->user()->id_rol == 4)
                     <a href="{{route('editar_razons',['id_razonsocial'=>$razons->id_razonsocial])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                         </a>
                        @else
                        Sin Permisos
                     @endif   
                     @endif

                        
                    </td>

                  </tr>
   @endforeach
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>


<!-------------------------------------------------- End Tabla de Consulta(Reporte) ---------------------------------------------------------------->



   
<!------------------------------------------------------------------------------------------------------------------>
@stop
@section('contenido2')
@stop