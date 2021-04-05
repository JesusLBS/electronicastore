@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>
<div class="titulo-reporte">
    <h1>Empleados</h1>
</div> 





 

<!-------------------------------------------------- Boton Agregar  ---------------------------------------------------------------->
<div class="content-agregar">
  <a href="{{route('registerempleado')}}">
    <button type="button" class="btn btn-outline-primary font-weight-bold">Agregar
    </button>
  </a>
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
              <center><h3 class="mb-0">Empleados</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="Clave">Clave</th>
                    <th scope="col" class="sort" data-sort="Empleado">Empleado</th>
                    <th scope="col" class="sort" data-sort="Departamento ">Departamento </th>
                    <th scope="col" class="sort" data-sort="Opciones"><center>Opciones</center></th>
                

                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($consulta2 as $empleado)
                  <tr>
                    <td>
                      <span class="block">{{$empleado->id_empleado}}</span>
                    </td>
                    <td>
                      <span class="block">{{$empleado->nombre_empleado}}</span>
                    </td>
                    <td> 
                      <span class="block">{{$empleado->nombre_departamento}}</span>
                    </td>
                    <td class="text-center">
                    @if(auth()->user()->id_rol == 1 )
                      @if($empleado->deleted_at)
                        <form id="activarempleado" action="{{route('activarempleado',['id_empleado'=>$empleado->id_empleado])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-success">Activar</button>
                        </form>
                        <form id="borrarempleado" action="{{route('borrarempleado',['id_empleado'=>$empleado->id_empleado])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-danger"><i class="fas fa-trash delete pd-seting-ed " title="Eliminar"></i></button>
                        </form>
                        @else
                        <form id="desactivarempleado" action="{{route('desactivarempleado',['id_empleado'=>$empleado->id_empleado])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-warning">Desactivar</button>
                        </form> 
                        @endif  
                       
                        <a href="{{route('editar_empleado',['id_empleado'=>$empleado->id_empleado])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                        </a>
                      @else
                      @if(auth()->user()->id_rol == 4)
                      <a href="{{route('editar_empleado',['id_empleado'=>$empleado->id_empleado])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
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