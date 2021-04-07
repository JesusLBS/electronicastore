


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
<form  id="registropedido" method = "POST" enctype="multipart/form-data">  
                    {{csrf_field()}}
<!------------------------------------------------------------------------------------------------------------------>
    <div class="row">
        <div class="col">
        <div class="row">
      <div class="col-sm-12">
       <div class="row">

           
            <div class="col-xs-5 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="pedido">Clave del pedido:
                     
                    </label>
                    <input type="text" name="pedido" id="pedido" value="001" readonly="readonly" class="form-control">
                </div>
            </div>
            <div class="col-xs-5 col-sm-4 col-md-4">
                <div class="form-group">
                    <label for="">Vendedor:
                     
                    </label>
                    <input type="text" name="" id="" value="001" readonly="readonly" class="form-control">
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
                    <label for="nombre_cliente">Usuario:</label>
                    <select id="id" name ="id" class="custom-select">
                    <option selected=""></option>
                     @foreach($User as $users)
                    <option value="{{$users->id}}"> {{$users->id}} {{$users->name}}</option>
                    @endforeach
                    </select>
                    @if($errors->first('id'))
                    <p class="text-danger">{{$errors->first('id')}}</p>
                    @endif
                </div>
            </div>
             
            <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="fecha_pedido">Fecha del Pedido:</label>
                    <input type="date" name="fecha_pedido" id="fecha_pedido" value="" class="form-control">
                    @if($errors->first('fecha_pedido'))
                    <p class="text-danger">{{$errors->first('fecha_pedido')}}</p>
                    @endif
                </div>
            </div>
             <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="fechaentrega_pedido">Fecha de Entrega:</label>
                    <input type="date" name="fechaentrega_pedido" id="fechaentrega_pedido" value="" class="form-control">
                    @if($errors->first('fechaentrega_pedido'))
                    <p class="text-danger">{{$errors->first('fechaentrega_pedido')}}</p>
                    @endif
                </div>
            </div>
            <div class="col-xs-5 col-sm-4 col-md-3">
                <div class="form-group">
                    <label for="hora_pedido">Hora del Pedido:</label>
                    <input type="time" name="hora_pedido" id="hora_pedido" value="" class="form-control">
                    @if($errors->first('hora_pedido'))
                    <p class="text-danger">{{$errors->first('hora_pedido')}}</p>
                    @endif
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
              <button type="submit"  id="addbutton" class="btn btn-outline-primary font-weight-bold" >Agregar Pedido</button>
            </center>
        </div>
    </div> 
    </form>
    </div>
</div>
</div>
</div>
<br>

<!------------------------------------------------------------------------------------------------------------------>
