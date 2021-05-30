@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>









<div class="titulo-reporte">
    <h1>Departamento</h1>
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
                <div class="card-header" id="registro departamento">Registro Departamento</div>
              </center>
                <div class="card-body">
                    <form action = "{{route('guardardepartamento')}}" method = "POST">  
                    {{csrf_field()}}                    
<br>
<br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave departamento:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id_departamento" type="text" class="form-control" value="{{$id_sigue}}" readonly="readonly" name="id_departamento"   autocomplete="id_departamento" autofocus disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre departamento:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                             

                            <div class="col-md-6">
                                <input id="nombre_departamento" type="text" class="form-control" value="{{old('nombre_departamento')}}" name="nombre_departamento" placeholder="Escriba el nuevo departamento"   autocomplete="name" autofocus>
                            @if($errors->first('nombre_departamento'))
                            <p class="text-danger">{{$errors->first('nombre_departamento')}}</p>
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
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
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
              <center><h3 class="mb-0">Clientes</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="tabledepartamento" class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>N°</th>
                    <th>Clave</th>
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
  var table = $('#tabledepartamento').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('departamento') }}",
    columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'id_departamento', name: 'id_departamento' },
            { data: 'nombre_departamento', name: 'nombre_departamento'},
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