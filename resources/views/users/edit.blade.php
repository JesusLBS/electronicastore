

















<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="detallepedido" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="detallepedido" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detallepedido"><center><b>Modificacion Usuario</b></center></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!------------------------------------------------------------------------------------------------------------------>
<form  id="userupdate" name="userupdate" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
  <div class="card-title">
    <h3 class="text-center" id="nameh3" name="nameh3"></h3>
  </div>
  <hr>
  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Foto del  Usuario:</label>
    <div class="col-md-6">
      <img class="imgperfil rounded" width=200 height=200 src="" id="imgusuario" name="imgusuario">

    </div>
  </div>
  <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">Clave Usuario:</label>
      <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>

      <div class="col-md-6">
          <input type="text" name="id_2" id="id_2" value="" class="form-control" readonly="">
      </div>
  </div>
  <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">Nombre Usuario:</label>
      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
      <div class="col-md-6">
        <input type="text" name="name_2" id="name_2" value="" class="form-control">
      </div>
  </div>
  <div class="form-group row">
      <label for="celular_2" class="col-md-4 col-form-label text-md-right">Celular:</label>
      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
      <div class="col-md-6">
          <input type="text" name="celular_2" id="celular_2" value="" class="form-control">
      </div>
  </div>
  <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">Email:</label>
      <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
      <div class="col-md-6">
          <input type="text" name="email_2" id="email_2" value="" class="form-control">
      </div>
  </div>
  <div class="row">
  <div class="col-xs-6 col-sm-8 col-md-6 form-group">
      <label for="activo">Activo:</label>

      <div class="custom-control custom-radio">
      <input type="radio" id="sexo1" name="activo_2"  value="1" class="custom-control-input">
      <label class="custom-control-label" for="sexo1">Si</label>
      </div>
      <div class="custom-control custom-radio">
      <input type="radio" id="sexo2" name="activo_2" value="0" class="custom-control-input">
      <label class="custom-control-label" for="sexo2">No</label>
      </div>
  </div>
  <div class="form-group">
      <label for="dni">Tipo de Usuario:
      </label>
      <select name = 'id_rol2' id="id_rol2" class="custom-select">
      @foreach($rol as $rolusuario)
      <option value="{{$rolusuario->id_rol}}">{{$rolusuario->rol}}</option>
      @endforeach

      </select>
  </div>
  </div>

  <div class='preview'>
            <img src="" id="imgprevi" width="100" height="100">
        </div>

  <div class="form-group">
      <label for="img_2">Actualizar Foto perfil:

      </label>
      <input type="file" name="img_2" id="img_2"  value="" class="form-control" tabindex="">
  </div>
<center>
  <button type="submit"  id="btnactualizaruser" style="width: 22%" name="btnactualizaruser" class="btn btn-outline-primary font-weight-bold" >Si,Actualizar</button>
  <button type="button" id="cerrar" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
</center>

</form>


<!------------------------------------------------------------------------------------------------------------------>
      </div>
    </div>
  </div>
</div>
