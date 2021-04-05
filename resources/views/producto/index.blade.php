@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>
<div class="titulo-reporte">
    <h1>Producto</h1>
</div> 




 
 
 
<!-------------------------------------------------- Boton Agregar  ---------------------------------------------------------------->
<div class="content-agregar">
  <a href="{{route('registerproducto')}}">
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
              <center><h3 class="mb-0">Productos</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr> 
                    <th>Foto</th>
                    <th>Clave</th>
                    <th>Producto</th>
                    <th>Precio Compra </th>
                    <th>Precio Venta </th>
                    <th><center>Opciones</center></th>
                

                  </tr>
                </thead>
                <tbody class="list">
                  @foreach($consulta2 as $producto)
                  <tr>
                    <td>
                      <div class="media align-items-center">

                        <a href="#" class=" rounded mr-3" data-toggle="tooltip" data-original-title="{{$producto->nombre_producto}}">
                          <img class="imgpr rounded" width=60 height=60 src="{{asset('archivos/'.$producto->imgpr)}}" name="imgpr">  
                        </a>
                      </div>
                    </td>
                    <td>
                      <span class="block">{{$producto->id_producto}}</span>
                    </td>
                    <td>
                      <span class="block">{{$producto->nombre_producto}}</span>
                    </td>
                    <td> 
                      <span class="block">$ {{$producto->preciocompra_producto}}</span>
                    </td>
                    <td> 
                      <span class="block">$ {{$producto->precioventa_producto}}</span>
                    </td>
                    <td class="text-center">
                      @if(auth()->user()->id_rol == 1 )
                      @if($producto->deleted_at)
                        <form id="activarproducto" action="{{route('activarproducto',['id_producto'=>$producto->id_producto])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-success">Activar</button>
                        </form>
                        <form id="borrarproducto" action="{{route('borrarproducto',['id_producto'=>$producto->id_producto])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-danger"><i class="fas fa-trash delete pd-seting-ed " title="Eliminar"></i></button>
                        </form>
                        @else
                        <form id="desactivarproducto" action="{{route('desactivarproducto',['id_producto'=>$producto->id_producto])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-warning">Desactivar</button>
                        </form> 
                        @endif  
                        <a href="{{route('editar_producto',['id_producto'=>$producto->id_producto])}}"><button type="button submit" class="btn btn-outline-primary"><i class="far fa-edit edit" title="Editar"></i></button></a>
                        @else
                         @if(auth()->user()->id_rol == 4)
                        <a href="{{route('editar_producto',['id_producto'=>$producto->id_producto])}}"><button type="button submit" class="btn btn-outline-primary"><i class="ti-pencil-alt" title="Editar">Editar</i></button></a>
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