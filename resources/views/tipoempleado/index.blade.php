@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>




<div class="titulo-reporte">
    <h1>Tipo de empleado</h1>
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
                <div class="card-header" id="tipo empleado">Registro de tipo empleado</div>
              </center>
                <div class="card-body">
                    <form action = "{{route('guardartempleado')}}" method = "POST">  
                    {{csrf_field()}}                    
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_tipo_empleado" type="text" class="form-control" value="{{$id_sigue}}" readonly="readonly" name="id_tipo_empleado"   autocomplete="id_tipo_empleado" autofocus disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Tipo empleado:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="nombre_tipoempleado" type="text" class="form-control" value="{{old('nombre_tipoempleado')}}" name="nombre_tipoempleado" placeholder="Escriba el tipo de empleado"   autocomplete="name" autofocus>
                            @if($errors->first('nombre_tipoempleado'))
                            <p class="text-danger">{{$errors->first('nombre_tipoempleado')}}</p>
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
              <center><h3 class="mb-0">Tipo de empleado</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="tabletipoempleados" class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>N°</th>
                    <th>Clave</th>
                    <th>Tipo Empleado</th>
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
  var table = $('#tabletipoempleados').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('templeado') }}",
    columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'id_tipo_empleado', name: 'id_tipo_empleado' },
            { data: 'nombre_tipoempleado', name: 'nombre_tipoempleado'},
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