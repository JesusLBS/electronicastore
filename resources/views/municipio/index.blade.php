@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>

<div class="titulo-reporte">
    <h1>Municipios</h1>
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
                <div class="card-header" id="municipio">Registro de municipio</div>
              </center>
                <div class="card-body">
                    <form action = "{{route('guardarmunicipio')}}" method = "POST">  
                    {{csrf_field()}}                    
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave Municipio:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_municipio" type="text" class="form-control" value="{{$id_sigue}}" readonly="readonly" name="id_municipio"   autocomplete="id_municipio" autofocus disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tipo de municipio:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="nombre_municipio" type="text" class="form-control" value="{{old('nombre_municipio')}}" name="nombre_municipio" placeholder="Escriba el tipo de municipio"   autocomplete="name" autofocus>
                            @if($errors->first('nombre_municipio'))
                            <p class="text-danger">{{$errors->first('nombre_municipio')}}</p>
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
              <center><h3 class="mb-0">Municipios</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th>Municipio</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($consulta2 as $municipio)
                  <tr>
                    
                    <td class="budget">
                       {{$municipio->id_municipio}}
                    </td>
                    <td>
                     {{$municipio->nombre_municipio}}
                    </td>
                    
                    <td>
                    @if(auth()->user()->id_rol == 1 )
                      @if($municipio->deleted_at)
                        <form id="activarmunicipio" action="{{route('activarmunicipio',['id_municipio'=>$municipio->id_municipio])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-success">Activar</button>
                        </form>
                        <form id="borrarmunicipio" action="{{route('borrarmunicipio',['id_municipio'=>$municipio->id_municipio])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-danger"><i class="fas fa-trash delete pd-seting-ed " title="Eliminar"></i></button>
                        </form>
                        @else
                        <form id="desactivarmunicipio" action="{{route('desactivarmunicipio',['id_municipio'=>$municipio->id_municipio])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-warning">Desactivar</button>
                        </form> 


                        @endif 
                        <a href="{{route('editar_municipio',['id_municipio'=>$municipio->id_municipio])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                         </a>
                     @else
                      @if(auth()->user()->id_rol == 4)
                     <a href="{{route('editar_municipio',['id_municipio'=>$municipio->id_municipio])}}"><button type="button submit" class="btn btn-outline-primary"><i class="far fa-edit edit" title="Editar"></i></button></a>
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