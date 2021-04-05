@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>



<div class="titulo-reporte">
    <h1>Pedidos</h1>
</div>


















<!-------------------------------------------------- Contenidos Boton Modal Agregar Pedido ---------------------------------------------------------------->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="agregarpedido" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="agregarpedido" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarpedido"><center><b>Agregar Pedido</b></center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<!------------------------------------------------------------------------------------------------------------------>
    <div class="row">
        <div class="col">
        <div class="row">
      <div class="col-sm-12">
       <div class="row">

           
            <div class="col-xs-5 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="id">Clave del pedido:
                     
                    </label>
                    <input type="text" name="id" id="id" value="001" readonly="readonly" class="form-control">
                </div>
            </div>
            <div class="col-xs-5 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="id">Vendedor:
                     
                    </label>
                    <input type="text" name="id" id="id" value="001" readonly="readonly" class="form-control">
                </div>
            </div>               
          </div> 
      </div>
    </div>
    </div>
    </div>

    <div class="row">
        <div class="col">
        <div class="row">
      <div class="col-sm-12">
       <div class="row">

              <div class="col-xs-5 col-sm-4 col-md-4">
                <div class="form-group">
                <label for="dni">Seleccione Cliente:</label>
                <select name = 'id_estado' class="custom-select">
                  <option selected=""></option>
                  
                  <option value=""></option>
                  
                </select>
              </div>
            </div>
            
            <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="codigo_postalcliente">Fecha del Pedido:</label>
                    <input type="date" name="codigo_postalcliente" id="codigo_postalcliente" value="" class="form-control">
                </div>
            </div>
             <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="codigo_postalcliente">Fecha de Entrega:</label>
                    <input type="date" name="codigo_postalcliente" id="codigo_postalcliente" value="" class="form-control">
                </div>
            </div>
            <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="codigo_postalcliente">Hora del Pedido:</label>
                    <input type="time" name="codigo_postalcliente" id="codigo_postalcliente" value="" class="form-control">
                </div>
            </div>
                       
          </div> 
      </div>
    </div>
    </div>
    </div>

<!------------------------------------------------------------------------------------------------------------------>

      <div class="form-group row mb-0 ">
        <div class="col-md-6 offset-md-4 ">
           
            <center>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
           
              <input  type="submit" id="addbutton" class="btn btn-outline-primary font-weight-bold"  value="Agregar Pedido"/>
            </center>
        </div>
    </div> 
    </div>
</div>
</div>
</div>
<br>


 


<!------------------------------------------------------------------------------------------------------------------>


<!-------------------------------------------------- Contenidos Boton Modal Agregar Pedido---------------------------------------------------------------->






<!-------------------------------------------------- Contenidos Boton Modal Definir Pedido ----------------------------------------------------------------

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><center><b>Pedido</b></center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!------------------------------------------------------------------------------------------------------------------>
    <div class="row">
        <div class="col">
        <div class="row">
      <div class="col-sm-12">
        <h5 class="modal-title" id=""><b>Detalles</b></h5>
        <label for="id">Clave de pedido</label>
        <input type="text" name="id" id="id" value="001" readonly="readonly" class="form-control">
        
        <div class="row">
          <div class="col-8 col-sm-3">
            <label for="id">Cliente:</label>
            <input type="text" name="id" id="id" value="Adriana" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="id">Fecha:</label>
            <input type="text" name="id" id="id" value="01/01/2021" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="id">Hora:</label>
            <input type="text" name="id" id="id" value="13:12:22 pm" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="id">Total:</label>
            <input type="text" name="id" id="id" value="$1800" readonly="readonly" class="form-control">
          </div>          
        </div>
      </div>
    </div>
    </div>
    </div>

    <div class="row">
        <div class="col">
        <div class="row">
      <div class="col-sm-12">
        <h5 class="modal-title" id=""><b>Articulos</b></h5>
        <div class="row">
            <div class="col-xs-5 col-sm-4 col-md-4">
                <div class="form-group">
                <label for="dni">Seleccione Producto:</label>
                <select name = 'id_estado' class="custom-select">
                  <option selected=""></option>
                  
                  <option value=""></option>
                  
                </select>
              </div>
            </div>
            <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="codigo_postalcliente">Precio:</label>
                    <input type="text" name="codigo_postalcliente" id="codigo_postalcliente" value="" class="form-control">
                </div>
            </div>
            <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="codigo_postalcliente">Cantidad:</label>
                    <input type="text" name="codigo_postalcliente" id="codigo_postalcliente" value="" class="form-control">
                </div>
            </div>
             <div class="col-xs-5 col-sm-4 col-md-2">
              <div class="form-group">
                    <label for="codigo_postalcliente">Agregar</label>
                <input type="submit" class="btn btn-outline-primary font-weight-bold"  value="Agregar"/>
                </div>
            </div>

            
          </div> 
      </div>
    </div>
    </div>
    </div>



<div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave Producto</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                  
                  <tr>
                    
                    <td class="budget">
                      01
                    </td>
                    <td>
                      TV 
                    </td>
                    <td>
                      10000
                    </td>
                    <td>
                      2 Piezas
                    </td>
                    <td>
                      20000
                    </td>
                    <td>
                      <button type="button submit" class="btn btn-outline-danger">Eliminar</button>  
                    </td>
                  </tr>
 
                </tbody>
              </table>
            </div>



    <div class="form-group row mb-0 ">
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Eliminar Todo</button>
        </div>
    </div> 

    <div class="form-group row mb-0 ">
        <div class="col-md-6 offset-md-4 ">
           
            <center>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
           
            <input type="submit" class="btn btn-outline-primary font-weight-bold"  value="Finalizar Pedido"/>
            </center>
        </div>
    </div> 
<!------------------------------------------------------------------------------------------------------------------>

      </div>

      
    </div>
  </div>
</div>

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
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th>Cliente</th>
                    <th>Cantidad Productos</th>

                    <th>Fecha Venta</th>
                    <th>Fecha de entrega</th>
                    <th>Estatus</th>                    
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                     
                  <tr>
                    <th scope="row">
                      001
                    </th>
                    <td class="budget">
                       Adriana
                    </td>
                    <td>
                      20 piezas
                    </td>
                    <td>
                     10/10/2021
                    </td>
                    <td>
                       22/11/2021
                    </td>
                    <td>
                    	Entregado
                    </td>
                    <td>
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Definir Pedido</button>
                     
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detallepedido">Detalles</button>
    
                     
                        
                    </td>


                  </tr>

                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>

<!-------------------------------------------------- End Tabla de Consulta(Reporte) ---------------------------------------------------------------->


 


 
<!-------------------------------------------------- Contenidos Boton Modal Detalle Pedido ----------------------------------------------------------------

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="detallepedido" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="detallepedido" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detallepedido"><center><b>Detalle</b></center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<!------------------------------------------------------------------------------------------------------------------>
  <div class="row">
        <div class="col">
        <div class="row">
      <div class="col-sm-12">
        <h5 class="modal-title" id=""><b>Detalles</b></h5>
        <div class="row">
          <div class="col-8 col-sm-3">
            <label for="id">Cliente:</label>
            <input type="text" name="id" id="id" value="Adriana" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="id">Fecha:</label>
            <input type="text" name="id" id="id" value="0/12/2021" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="id">Hora:</label>
            <input type="text" name="id" id="id" value="13:00:25 pm" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="id">Total:</label>
            <input type="text" name="id" id="id" value="$1800" readonly="readonly" class="form-control">
          </div>          
        </div>
      </div>
    </div>
    </div>
    </div>

<br>

    <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave Pedido</th>
                    <th>Clave Producto</th>
                    <th>Producto</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                  
                  </tr>
                </thead>
                <tbody class="list">
                  
                  <tr>
                    
                    <td class="budget">
                      001
                    </td>
                    <td>
                      01 
                    </td>
                    <td>
                      TV 
                    </td>
                    <td>
                      LG
                    </td>
                    <td>
                      10000
                    </td>
                    <td>
                      2 Piezas
                    </td>
                    <td>
                      20000
                    </td>
                    
                  </tr>
 
                </tbody>
              </table>
            </div>
 <div class="row">
        <div class="col">
        <div class="row">
      <div class="col-sm-12">
        
        <div class="row">
          
          
         
          <div class="col-12 col-sm-12" style="margin-left: 70%;">
            Total:
          </div>          
        </div>
      </div>
    </div>
    </div>
    </div>
 

  <div class="form-group row mb-0 ">
        <div class="col-md-6 offset-md-4 ">
           
            <center>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
           
            <input type="submit" class="btn btn-outline-success font-weight-bold"  value="Liberar"/>
            </center>
        </div>
    </div> 
<!------------------------------------------------------------------------------------------------------------------>

    </div>
  </div>
</div>

<!-------------------------------------------------- Contenidos Boton Modal Detalle Pedido---------------------------------------------------------------->







<!------------------------------------------------------------------------------------------------------------------>
@stop



@section('contenido2')
<!------------------------------------------------------------------------------------------------------------------>




<script type="text/javascript">
</script>





<!------------------------------------------------------------------------------------------------------------------>
@stop