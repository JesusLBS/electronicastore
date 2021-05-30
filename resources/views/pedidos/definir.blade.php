

















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
<form  id="updatepedido" name="updatepedido" method="POST" enctype="multipart/form-data">  
                    {{csrf_field()}}
       <div class="row">
        <div class="col">
        <div class="row"> 
      <div class="col-sm-12">
        <h5 class="modal-title" id=""><b>Detalles</b></h5>
        <label for="id_pedido2">Clave de pedido</label>
        <input type="text" name="id_pedido2" id="id_pedido2" value="" class="form-control" readonly="readonly">
        
        <div class="row"> 
          <div class="col-8 col-sm-3">
            <label for="id2">Cliente:</label>
            <input type="text" name="id2" id="id2" value="" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="fecha_pedido2">Fecha de realizacion:</label>
            <input type="text" name="fecha_pedido2" id="fecha_pedido2" value="" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="hora_pedido2">Hora:</label>
            <input type="text" name="hora_pedido2" id="hora_pedido2" value="" readonly="readonly" class="hora_pedido form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="total1">Total:</label>
            <input type="text" name="total1" id="total1" value="" readonly="readonly" class="form-control">
          </div> 
          <div class="col-8 col-sm-3">
            <label for="total_piezas">Total Piezas:</label>
            <input type="text" name="total_piezas" id="total_piezas" value="" readonly="readonly" class="form-control">
          </div>          
        </div>
      </div>
    </div>
    </div> 
    </div>
</form>

<!------------------------------------------------------------------------------------------------------------------>
<form  id="definiendopedido" name="definiendopedido" method="POST" enctype="multipart/form-data">  
                    {{csrf_field()}}


  
    <div class="row">
        <div class="col">
        <div class="row">
      <div class="col-sm-12">
        <h5 class="modal-title" id=""><b>Articulos</b></h5>
        <div class="row">
            <div class="col-xs-5 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="nombre_cliente">Seleccione Producto:</label>
                    <select id="id_producto" name ="id_producto" class="selectprod custom-select">
                    <option selected=""></option>
                     @foreach($productos as $producto)
                    <option value="{{$producto->id_producto}}"> {{$producto->id}} {{$producto->nombre_producto}}</option>
                    @endforeach
                    </select>
                    
                </div>
            </div>
            <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="preciocompra_producto">Precio:</label>
                    <input type="text" name="preciocompra_producto" id="preciocompra_producto" value="" class="form-control" readonly="">
                    <span class="text-danger" id="precio_productoError"></span>
                </div>
            </div>
            <div class="col-xs-5 col-sm-3 col-md-2">
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" value="" class="form-control">
                    <span class="text-danger" id="cantidadError"></span>
                </div>
            </div>
             <div class="col-xs-5 col-sm-3 col-md-3">
              <div class="form-group">
                    <label for="subtotal">Subtotal:</label>
                    <input type="number" name="subtotal" id="subtotal" value="" class="form-control" readonly="">
                </div>
            </div>

            
          </div>
          <div class="row">

          <div class="col-12 col-sm-12" style="margin-left: 75%;">
                <div class="form-group" >
                    
                    <button type="submit"  id="btnagregarproduct" style="width: 22%" name="btnagregarproduct" class="btn btn-primary font-weight-bold" >Agregar</button>
                </div>
            </div> 
          </div> 
      </div>
    </div>
    </div>
    </div>

</form>
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
                    <th>Clave Producto</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>                
                    <th style="text-align: center;">Opciones</th>
                  </tr>
                </thead>
<!-------------------------------------------------- ---------------------------------------------------------------->
    <tbody id="tabledefiniendo">
   
    </tbody>

<!-------------------------------------------------- ---------------------------------------------------------------->
              </table>
            </div>
          </div>
        </div>
      </div>


    <div class="form-group row mb-0 ">
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-danger" >Eliminar Todo</button>
        </div>
    </div> 

    <div class="form-group row mb-0 ">
        <div class="col-md-6 offset-md-4 ">
           
            <center>
              <button type="button" id="cerrar" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="button" id="calcular" class="btn btn-warning font-weight-bold">Calcular</button>

              <button type="submit" id="finalizarpedido" name="finalizarpedido" class="btn btn-outline-primary font-weight-bold" disabled="">Finalizar Pedido</button>
            </center>
        </div>
    </div> 
<!------------------------------------------------------------------------------------------------------------------>

      </div>

      
    </div>
  </div>
</div>
