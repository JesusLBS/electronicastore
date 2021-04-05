@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>




<div class="titulo-reporte">
    <h1>Tipo de empleado</h1>
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
                <div class="card-header" id="tipo empleado">Registro de tipo empleado</div>
              </center>
                <div class="card-body">
                    <form action = "{{route('guardartempleado')}}" method = "POST">  
                    {{csrf_field()}}                    
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_tipo_empleado" type="text" class="form-control" value="{{$id_sigue}}" readonly="readonly" name="id_tipo_empleado"   autocomplete="id_tipo_empleado" autofocus disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tipo empleado:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="nombre_tipoempleado" type="text" class="form-control" value="{{old('nombre_tipoempleado')}}" name="nombre_tipoempleado" placeholder="Escriba el tipo de empleado"   autocomplete="name" autofocus>
                            @if($errors->first('nombre_tipoempleado'))
                            <p class="text-danger">{{$errors->first('nombre_tipoempleado')}}</p>
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

<!-------------------------------------------------- Tabla de Consulta(Reporte) ---------------------------------------------------------------->

  <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <center><h3 class="mb-0">Tipo de templeado</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th>Tipo Empleado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($consulta2 as $templeado)
                  <tr>
                    
                    <td class="budget">
                       {{$templeado->id_tipo_empleado}}
                    </td>
                    <td>
                     {{$templeado->nombre_tipoempleado}}
                    </td>
                    
                    <td>
                    @if(auth()->user()->id_rol == 1 )
                      @if($templeado->deleted_at)
                        <form id="activartempleado" action="{{route('activartempleado',['id_tipo_empleado'=>$templeado->id_tipo_empleado])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-success">Activar</button>
                        </form>
                        <form id="borrartempleado" action="{{route('borrartempleado',['id_tipo_empleado'=>$templeado->id_tipo_empleado])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-danger"><i class="fas fa-trash delete pd-seting-ed " title="Eliminar"></i></button>
                        </form>
                        @else
                        <form id="desactivartempleado" action="{{route('desactivartempleado',['id_tipo_empleado'=>$templeado->id_tipo_empleado])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-warning">Desactivar</button>
                        </form> 


                        @endif 
                        <a href="{{route('editar_templeado',['id_tipo_empleado'=>$templeado->id_tipo_empleado])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                         </a>
                     @else
                      @if(auth()->user()->id_rol == 4)
                     <a href="{{route('editar_templeado',['id_tipo_empleado'=>$templeado->id_tipo_empleado])}}"><button type="button submit" class="btn btn-outline-primary"><i class="far fa-edit edit" title="Editar"></i></button></a>
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