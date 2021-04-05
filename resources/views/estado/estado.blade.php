@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>


<div class="titulo-reporte">
    <h1>Estados</h1>
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
                <div class="card-header" id="registrarse">Registro Estados</div>
              </center>
                <div class="card-body">
                    <form action = "{{route('guardarestado')}}" method = "POST">  
                    {{csrf_field()}}                    
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave estado:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_estado" type="text" class="form-control" value="{{$id_sigue}}" readonly="readonly" name="id_estado"  required autocomplete="id_estado" autofocus disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre Estado:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="nombre_estado" type="text" class="form-control" value="{{old('nombre_estado')}}" name="nombre_estado" placeholder="Escriba el nuevo estado"  required autocomplete="name" autofocus>
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
                                     Registrar
                                </button>
                                <input type="button" class="btn btn-outline-danger"  value="Regresar" name="Back2" onclick="history.back()"/>
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
<!-------------------------------------------------- Tabla de Consulta(Reporte) ---------------------------------------------------------------->


    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <center><h3 class="mb-0">Estados</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($consulta2 as $estado)
                  <tr>
                    
                    <td class="budget">
                       {{$estado->id_estado}}
                    </td>
                    <td>
                     {{$estado->nombre_estado}}
                    </td>
                    
                    <td>
                    @if(auth()->user()->id_rol == 1 )
                      @if($estado->deleted_at)
                        <form id="activarestado" action="{{route('activarestado',['id_estado'=>$estado->id_estado])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-success">Activar</button>
                        </form>
                        <form id="borrarestado" action="{{route('borrarestado',['id_estado'=>$estado->id_estado])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-danger">
                                                      <span class="" title="Eliminar">Eliminar</span>
                                                    </button>
                        </form>
                        @else
                         <form id="desactivarestado" action="{{route('desactivarestado',['id_estado'=>$estado->id_estado])}}" method="POST" enctype="multipart/form-data"> 
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-warning">Desactivar</button>
                        </form> 


                        @endif 
                         <a href="{{route('editar_estado',['id_estado'=>$estado->id_estado])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                         </a>
                     @else
                      @if(auth()->user()->id_rol == 4)
                     <a href="{{route('editar_estado',['id_estado'=>$estado->id_estado])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
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