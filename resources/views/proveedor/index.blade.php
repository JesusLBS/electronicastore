@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>
<div class="titulo-reporte">
    <h1>Proveedor</h1>
</div> 





 
 
<!-------------------------------------------------- Boton Agregar  ---------------------------------------------------------------->
<div class="content-agregar">
  <a href="{{route('registerproveedor')}}">
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
              <center><h3 class="mb-0">Proveedor</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th>Proveedor</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($consulta2 as $proveedor)
                  <tr>
                    
                    <td>
                      <span>{{$proveedor->id_proveedor}}</span>
                    </td>
                    <td>
                      <span>{{$proveedor->nombre_proveedor}}</span>
                    </td>
                    <td> 
                      <span>{{$proveedor->celular_proveedor}}</span>
                    </td>
                    <td> 
                      <span>{{$proveedor->email_proveedor}}</span>
                    </td>
                    
                    <td> 
                    @if(auth()->user()->id_rol == 1 )
                      @if($proveedor->deleted_at)
                        <form id="activarproveedor" action="{{route('activarproveedor',['id_proveedor'=>$proveedor->id_proveedor])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-success">Activar</button>
                        </form>
                        <form id="borrarproveedor" action="{{route('borrarproveedor',['id_proveedor'=>$proveedor->id_proveedor])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-danger"><i class="fas fa-trash delete pd-seting-ed " title="Eliminar"></i></button>
                        </form>
                        @else
                        <form id="desactivarproveedor" action="{{route('desactivarproveedor',['id_proveedor'=>$proveedor->id_proveedor])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-warning">Desactivar</button>
                        </form> 


                        @endif 
                        <a href="{{route('editar_proveedor',['id_proveedor'=>$proveedor->id_proveedor])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                         </a>
                     @else
                      @if(auth()->user()->id_rol == 4)
                     <a href="{{route('editar_proveedor',['id_proveedor'=>$proveedor->id_proveedor])}}"><button type="button submit" class="btn btn-outline-primary"><i class="far fa-edit edit" title="Editar"></i></button></a>
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