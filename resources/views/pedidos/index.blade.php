@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>




<div class="titulo-reporte">
    <h1>Pedidos</h1>
</div>


<!-------------------------------------------------- Contenidos Boton Modal Agregar Pedido ---------------------------------------------------------------->

@include('pedidos.agregar')

<!-------------------------------------------------- Contenidos Boton Modal Agregar Pedido---------------------------------------------------------------->


<!-------------------------------------------------- Contenidos Boton Modal Definir Pedido ---------------------------------------------------------------->

@include('pedidos.definir')
<!-------------------------------------------------- Contenidos Boton Modal Definir Pedido---------------------------------------------------------------->


<!-------------------------------------------------- Tabla de Consulta(Reporte) ---------------------------------------------------------------->

    <div class="container-fluid mt--6">


    	<!-------------------------------------------------- Boton Agregar Modal ---------------------------------------------------------------->

		    <div class="content-agregar">
             <!-- Large modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarpedido">Nuevo Pedido</button>
    
        </div> 

		<!-------------------------------------------------- Boton Agregar Modal ---------------------------------------------------------------->

      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <center><h3 class="mb-0">Pedidos</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="tablepedidos" class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>Clave P.</th>
                    <th>Cliente</th>
                    <th>Cantidad Productos</th>
                    <th>Fecha Pedido</th>
                    <th>Fecha de Entrega</th>
                    <th>Estatus</th>                    
                    <th style="text-align: center;">Opciones</th>
                  </tr>
                </thead>
                

              </table>
            </div>
            
          </div>
        </div>
      </div>

<!-------------------------------------------------- End Tabla de Consulta(Reporte) ---------------------------------------------------------------->


<!-------------------------------------------------- Contenidos Boton Modal Detalle Pedido ---------------------------------------------------------------->

@include('pedidos.detalle')

<!-------------------------------------------------- Contenidos Boton Modal Detalle Pedido---------------------------------------------------------------->


<!------------------------------------------------------------------------------------------------------------------>
@stop



@section('contenido2')
<!------------------------------------------------------------------------------------------------------------------>




<script type="text/javascript">
  $(document).ready(function(){
    var tablapedidos = $('#tablepedidos').DataTable({
      processing:true,
      serverSide:true,
      ajax:{
        url: "{{route('pedidos')}}",
      },
      columns:[
          {data: 'id_pedido'},
          {data: 'name'},
          {data: 'total_piezas'},
          {data: 'fecha_pedido'},
          {data: 'fechaentrega_pedido'},
          {data: 'estatus'},
          {data: 'btn'}
      ]
    });
  });
</script>





<!------------------------------------------------------------------------------------------------------------------>
@stop