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
      
        <div class="row">
          <div class="col-8 col-sm-3">
            <label for="id4">Clave de pedido:</label>
            <input type="text" name="id4" id="id4" value="" readonly="readonly" class="form-control">
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
        <h5 class="modal-title" id=""><b>Detalles</b></h5>
        <div class="row">
          <div class="col-8 col-sm-3">
            <label for="id3">Cliente:</label>
            <input type="text" name="id3" id="id3" value="" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="fecha_pedido3">Fecha:</label>
            <input type="text" name="fecha_pedido3" id="fecha_pedido3" value="" readonly="" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="hora_pedido3">Hora:</label>
            <input type="text" name="hora_pedido3" id="hora_pedido3" value="" readonly="" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="total">Total:</label>
            <input type="text" name="total" id="total" value="" readonly="readonly" class="total form-control">
          </div>          
        </div>
      </div>
    </div>
    </div>
    </div>

<br>


                
<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <center><h4 class="mb-0">Productos agregados</h4></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table table-hover">
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
<!-------------------------------------------------- ---------------------------------------------------------------->
    <tbody id="tabledetalle">
   
    </tbody>

<!-------------------------------------------------- ---------------------------------------------------------------->
              </table>
            </div>
          </div>
        </div>
      </div>
 <div class="row">
        <div class="col">
        <div class="row">
      <div class="col-sm-12">
        
        <div class="row">
          
          
         
          <div class="col-12 col-sm-12" style="margin-left: 70%;">
            Total: <span id="totalspan"></span>
          </div>          
        </div>
      </div>
    </div>
    </div>
    </div>
 

  <div class="form-group row mb-0 ">
        <div class="col-md-6 offset-md-4 ">
           
            <center> 
              <button type="button" id="cerrar2" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
           
           
            <input type="submit" id="liberar" name="liberar" class="btn btn-outline-success font-weight-bold"  value="Liberar"/>
           
            
            </center>
        </div>
    </div> 
<!------------------------------------------------------------------------------------------------------------------>

    </div>
  </div>
</div>