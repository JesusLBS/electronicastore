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
    <a href="{{url('pdfempleado')}}">
  <button class="btn btn-outline-danger">PDF</button>
 </a>
 <hr>
 <!--------------------------------------------------*---------------------------------------------------------------->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <center><h3 class="mb-0">Empleados</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="tableempleados" class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>N°</th>
                    <th>Clave</th>
                    <th>Empleado</th>
                    <th>Departamento</th>
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
  var table = $('#tableempleados').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('electronica_empleado') }}",
    columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'id_empleado', name: 'id_empleado' },
            { data: 'nombre_empleado', name: 'nombre_empleado'},
            { data: 'nombre_departamento', name: 'nombre_departamento' },
            {
                data: 'btn',
                name: 'btn',
                orderable: true,
                searchable: true
            },
        ]
      });
});
</script>
@stop
