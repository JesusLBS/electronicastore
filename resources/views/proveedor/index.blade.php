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
              <table id="tableproveedores" class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>N°</th>
                    <th>Clave</th>
                    <th>Proveedor</th>
                    <th>Telefono</th>
                    <th>Email</th>
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
  var table = $('#tableproveedores').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('electronica_proveedor') }}",
    columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'id_proveedor',name: 'id_proveedor',},
            { data: 'nombre_proveedor', name: 'nombre_proveedor'},
            { data: 'celular_proveedor', name: 'celular_proveedor' },
            { data: 'email_proveedor', name: 'email_proveedor' },
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



