@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>

<div class="titulo-reporte">
    <h1>Informacion Clientes </h1>
</div>

<!-------------------------------------------------- Mensaje ---------------------------------------------------------------->



<!--------------------------------------------------*---------------------------------------------------------------->
<!-------------------------------------------------- Boton Agregar  ---------------------------------------------------------------->
<div class="content-agregar">
  <a href="{{route('electronica_inforcliente')}}">
    <button type="button" class="btn btn-outline-primary font-weight-bold">Agregar
    </button>
  </a>
</div>

<!-------------------------------------------------- Tabla de Consulta(Reporte) ---------------------------------------------------------------->

    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <center><h3 class="mb-0">Informacion Clientes</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th>Foto del Usuario</th>
                    <th>Nombre Cliente</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Telefono</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($consulta2 as $infclient)
                  <tr>
                    
                    <td class="budget">
                       {{$infclient->id_infcliente}}
                    </td>
                    <td>
                     <div class="media align-items-center">

                        <a href="#" class="avatar rounded-circle mr-3" data-toggle="tooltip" 
                        title="{{$infclient->id}} {{$infclient->name}}">
                          <img class="imgperfil"  width="60px" height="60px" src="{{asset('archivos/'.$infclient->img)}}">
                        </a>

                      </div>

                    </td>
                    <td>
                      <span >
                        <span>{{$infclient->nombre_cliente}} {{$infclient->apellido_pcliente}} {{$infclient->apellido_mcliente}}</span>
                      </span>
                    </td>
                    <td>
                      <span>{{$infclient->email_cliente}}</span>
                    </td>
                    <td>
                      <span>{{$infclient->nombre_estado}}</span>
                    </td>
                    <td>
                      <span>{{$infclient->celular_cliente}}</span>
                    </td>
                    
                    <td>
                    @if(auth()->user()->id_rol == 1 )
                      @if($infclient->deleted_at)
                        <form id="activarinfcliente" action="{{route('activarinfcliente',['id_infcliente'=>$infclient->id_infcliente])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-success">Activar</button>
                        </form>
                        <form id="borrarinfcliente" action="{{route('borrarinfcliente',['id_infcliente'=>$infclient->id_infcliente])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-danger">
                                                      <span class="" title="Eliminar">Eliminar</span>
                                                    </button>
                        </form>
                        @else
                         <form id="desactivarinfcliente" action="{{route('desactivarinfcliente',['id_infcliente'=>$infclient->id_infcliente])}}" method="POST" enctype="multipart/form-data"> 
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-warning">Desactivar</button>
                        </form> 


                        @endif 
                         <a href="{{route('editar_infcliente',['id_infcliente'=>$infclient->id_infcliente])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                         </a>
                     @else
                      @if(auth()->user()->id_rol == 4)
                     <a href="{{route('editar_infcliente',['id_infcliente'=>$infclient->id_infcliente])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
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