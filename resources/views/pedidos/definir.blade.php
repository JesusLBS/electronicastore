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
        <label for="clave">Clave de pedido</label>
        <input type="text" name="clave" id="clave" value="001" readonly="readonly" class="form-control">
        
        <div class="row">
          <div class="col-8 col-sm-3">
            <label for="nameu">Cliente:</label>
            <input type="text" nameu="nameu" id="nameu" value="Adriana" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="fechapedidou">Fecha:</label>
            <input type="text" name="fechapedidou" id="fechapedidou" value="01/01/2021" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="fechaentregau">Hora:</label>
            <input type="text" name="fechaentregau" id="fechaentregau" value="13:12:22 pm" readonly="readonly" class="form-control">
          </div>
          <div class="col-8 col-sm-3">
            <label for="Total">Total:</label>
            <input type="text" name="Total" id="Total" value="$1800" readonly="readonly" class="form-control">
          </div> 
          <div class="col-8 col-sm-3">
            <label for="cpiezas">Total Piezas:</label>
            <input type="text" name="cpiezas" id="cpiezas" value="5 Piezas" readonly="readonly" class="form-control">
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
                    <label for="nombre_cliente">Seleccione Producto:</label>
                    <select id="id_producto" name ="id_producto" class="custom-select">
                    <option selected=""></option>
                     @foreach($productos as $producto)
                    <option value="{{$producto->id_producto}}"> {{$producto->id}} {{$producto->nombre_producto}}</option>
                    @endforeach
                    </select>
                    @if($errors->first('id_producto'))
                    <p class="text-danger">{{$errors->first('id_producto')}}</p>
                    @endif
                </div>
            </div>
            <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="text" name="precio" id="precio" value="" class="form-control">
                </div>
            </div>
            <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="text" name="cantidad" id="cantidad" value="" class="form-control">
                </div>
            </div>
             <div class="col-xs-5 col-sm-4 col-md-2">
              <div class="form-group">
                    <label for="agregardefinir">Agregar</label>
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
