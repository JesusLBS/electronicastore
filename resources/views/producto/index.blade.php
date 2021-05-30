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

<!-------------------------------------------------- Tabla de Consulta(Reporte DataTables) ---------------------------------------------------------------->

    <div class="container-fluid mt--6">


      <!-------------------------------------------------- Boton Agregar Modal ---------------------------------------------------------------->

        <div class="content-agregar">
        <form name="form_reloj"> 
          Hora:
          <input type="text" name="hora_pedido0" id="hora_pedido0"  class="form-control" value="" readonly=""> 
        </form>  
            
        </div> 

 
    <!-------------------------------------------------- Boton Agregar Modal ---------------------------------------------------------------->

      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <center><h3 class="mb-0">Productos</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="tableproductos" class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>N°</th>
                    <th>Foto</th>
                    <th>Clave</th>
                    <th>Producto</th>
                    <th>Precio Compra </th>
                    <th>Precio Venta </th>
                    <th>Opciones</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>

<!-------------------------------------------------- End Tabla de Consulta(Reporte DataTables) ---------------------------------------------------------------->



<!------------------------------------------------------------------------------------------------------------------>
@stop
@section('contenido2')
<script type="text/javascript">
$(function(){
  var table = $('#tableproductos').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('electronica_producto') }}",
    columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { 
              data: 'imgpr',
              name: 'imgpr',
              sortable: false,
              searchable: false,
              render: function (imgpr) {
                if (!imgpr) {
                    return 'N/A';
                } 
                else {
                    var imgpr =  imgpr;
                    return '<img src="archivos/' + imgpr + '" height="70px" width="90px" />';
                }
            }
            },
            { data: 'id_producto', name: 'id_producto'},
            { data: 'nombre_producto', name: 'nombre_producto' },
            { data: 'preciocompra_producto', name: 'preciocompra_producto' },
            { data: 'precioventa_producto', name: 'precioventa_producto' },
            {
                data: 'btn',
                name: 'btn',
                orderable: true,
                searchable: true,
            },
        ]
      });
});
</script>
@stop