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
              <center><h3 class="mb-0">Clientes</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="tableclientes" class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>N°</th>
                    <th>Clave</th>
                    <th>Foto del Usuario</th>
                    <th>Nombre Cliente</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Telefono</th>
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
  var table = $('#tableclientes').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('cliente') }}",
    columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'id_infcliente', name: 'id_infcliente' },
            { data: 'img', name: 'img' },
            { data: 'nombre_cliente', name: 'nombre_cliente'},
            { data: 'email_cliente', name: 'email_cliente' },
            { data: 'nombre_estado', name: 'nombre_estado' },
            { data: 'celular_cliente', name: 'celular_cliente' },
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