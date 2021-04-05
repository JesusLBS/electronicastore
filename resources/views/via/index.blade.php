@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>

<div class="titulo-reporte">
    <h1>Tipo de via</h1>
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
                <div class="card-header" id="registrarse">Registro de tipo via</div>
              </center>
                <div class="card-body">
                    <form action = "{{route('guardarvia')}}" method = "POST">  
                    {{csrf_field()}}                    
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave via:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_via" type="text" class="form-control" value="{{$id_sigue}}" readonly="readonly" name="id_via"   autocomplete="id_via" autofocus disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tipo de via:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="tipo_via" type="text" class="form-control" value="{{old('tipo_via')}}" name="tipo_via" placeholder="Escriba el tipo de via"   autocomplete="name" autofocus>
                            @if($errors->first('tipo_via'))
                            <p class="text-danger">{{$errors->first('tipo_via')}}</p>
                            @endif
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Descripcion via:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="descripcion_via" type="text" class="form-control" value="{{old('descripcion_via')}}" name="descripcion_via" placeholder="Descripcion del tipo de via"   autocomplete="name" autofocus>
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
              <center><h3 class="mb-0">Tipo de via</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th>Tipo de via</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                   @foreach($consulta2 as $via)
                  <tr>                    
                    <td>
                      <span class="budget">{{$via->id_via}}</span>
                    </td>
                    <td>
                      <span >{{$via->tipo_via}}</span>
                    </td>
                    <td>
                      <span >{{$via->descripcion_via}}</span>
                    </td>
                    
                    <td>
                    @if(auth()->user()->id_rol == 1 )
                      @if($via->deleted_at)
                        <form id="activarvia" action="{{route('activarvia',['id_via'=>$via->id_via])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-success">Activar</button>
                        </form>
                        <form id="borrarvia" action="{{route('borrarvia',['id_via'=>$via->id_via])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-danger"><i class="fas fa-trash delete pd-seting-ed " title="Eliminar"></i></button>
                        </form>
                        @else
                         <form id="desactivarvia" action="{{route('desactivarvia',['id_via'=>$via->id_via])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-warning">Desactivar</button>
                        </form>  


                        @endif 
                         <a href="{{route('editar_via',['id_via'=>$via->id_via])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                     @else
                      @if(auth()->user()->id_rol == 4)
                     <a href="{{route('editar_via',['id_via'=>$via->id_via])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
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


















