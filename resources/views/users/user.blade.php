@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>

<div class="titulo-reporte">
    <h1>Reporte Usuarios</h1>
</div>

<!-------------------------------------------------- Boton Agregar Modal ---------------------------------------------------------------->
<div class="content-agregar">
    <!-- Large modal -->
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#staticBackdrop">Agregar</button>

</div>


<!-------------------------------------------------- Formulariio Boton Agregar Modal ---------------------------------------------------------------->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><b>Registro usuario</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--****************************************-->
<br>
<br>
                            <form action="{{route('registeruser')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                <div class="form-group">
                    <label for="id">Clave del nuevo usuario:

                    </label>
                    <input type="text" name="id" id="id" value="{{$id_sigue}}" readonly="readonly" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Nombre:
                    <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('name'))
                      <p class="text-danger">{{$errors->first('name')}}</p>
                      @endif
                    </label>
                <input type="text" name="name" id="name"  value="{{old('name')}}" class="form-control" placeholder="Nombre" tabindex="">
                </div>
                <div class="form-group">
                    <label for="name">Celular:
                    <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('celular'))
                      <p class="text-danger">{{$errors->first('celular')}}</p>
                      @endif
                    </label>
                <input type="text" name="celular" id="celular"  value="{{old('celular')}}" class="form-control" placeholder="Celular" tabindex="">
                </div>

                <div class="form-group">
                    <label for="email">Email:
                      <label for="email" class="col-md-1 col-form-label text-md-right asterisco">*</label>
                      @if($errors->first('email'))
                      <p class="text-danger">{{$errors->first('email')}}</p>
                      @endif
                    </label>
                    <input type="email" name="email" id="email"  value="{{old('email')}}" class="form-control" placeholder="Email" tabindex="">

                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>


<div class="form-group">
                    <label for="img">Foto de perfil:
                      @if($errors->first('img'))
                      <p class="text-danger">{{$errors->first('img')}}</p>
                      @endif
                    </label>
                    <input type="file" name="img" id="img"  value="{{old('img')}}" class="form-control" tabindex="">
                </div>


                <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 form-group">
                <label for="activo">Activo:</label>
                <div class="custom-control custom-radio">
                <input type="radio" id="activo1" name="activo"  value = "1" class="custom-control-input" checked="">
                <label class="custom-control-label" for="activo1">Si</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="activo2" name="activo" value = "0" class="custom-control-input">
                <label class="custom-control-label" for="activo2">No</label>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 form-group">
                <label for="dni">Tipo usuario:

                </label>
                <select name = 'id_rol' class="custom-select">
                  <option selected=""></option>
                  @foreach($rol as $rolusuario)
                  <option value="{{$rolusuario->id_rol}}">{{$rolusuario->rol}}</option>
                  @endforeach

                </select>
              </div>
        </div>

        <hr>
                                <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <center>
                               <button type="submit" id="enviar"  class="btn btn-outline-primary" >
                                     <b>Registrar</b>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                
                            </center>
                            </div>
                        </div>

                                

                            </form>

      </div>
      
    </div>
  </div>
</div>
<!-------------------------------------------------- End Modal ---------------------------------------------------------------->

<!-------------------------------------------------- Tabla de Consulta(Reporte DataTables) ---------------------------------------------------------------->

    <div class="container-fluid mt--6">


      <!-------------------------------------------------- Boton Agregar Modal ---------------------------------------------------------------->

        <div class="content-agregar">
        <form name="form_reloj"> 
          Hora:
          <input type="text" name="hora_pedido0" id="hora_pedido0"  class="form-control" value="" readonly=""> 
        </form>  
            
        </div> 

 <a href="{{url('pdfuser')}}">
  <button class="btn btn-outline-danger">PDF</button>
 </a>
 <hr>
    <!-------------------------------------------------- Boton Agregar Modal ---------------------------------------------------------------->

      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <center><h3 class="mb-0">Usuarios</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="tableusers" class="table table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th>Avatar</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    <div>
      <div>
      
      </div>
    </div>
<!-------------------------------------------------- End Tabla de Consulta(Reporte DataTables) ---------------------------------------------------------------->
@include('users.mdesactivaru')

@include('users.activar')
@include('users.eliminar')


@include('users.edit')
<!------------------------------------------------------------------------------------------------------------------>




@stop


@section('contenido2')

<script type="text/javascript">
$(function(){
  var table = $('#tableusers').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('user') }}",
    columns: [
            //{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'id', name: 'id' },
            {
            data: 'img',
            sortable: false,
            searchable: false,
            render: function (img) {
                if (!img) {
                    return 'N/A';
                }
                else {
                    var img =  img;
                    return '<img src="archivos/' + img + '" height="70px" width="90px" />';
                }
            }
},
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'celular', name: 'celular' },
            {
                data: 'btn',
                name: 'btn',
                orderable: true,
                searchable: true
            },
        ]
      });
});

//Editar usuario vista completa
//----------------------------------------------------------------

function edituser(id){
  console.log("Clave del usuario: " +id);
  window.location.replace("editar_user/"+id);
}


//Editar usuario
//----------------------------------------------------------------


function editusermodal(id){
  console.log("Clave del usuario: " +id);
  $.get('editar_user2/'+id,function(data){
    //Asignar datos en la ventana modal
    console.log("Clave del usuario seleccionado: " +id);
    console.table(data);
    $('#id_2').val(id);
    for (var i = 0; i < data.length; i++) {
            $('#name_2').val(data[i].name);
            $('#nameh3').html(data[i].name);
            $('#imgusuario').attr("src", 'archivos/'+data[i].img);
            $('#email_2').val(data[i].email);
            $('#celular_2').val(data[i].celular);
            $('#id_rol2').val(data[i].id_rol);
            if(data[i].activo == 1){
              $('#sexo1').prop('checked',true);
            }else{
              $('#sexo2').prop('checked',true);
            }
          }
  })
}

//Update
//----------------------------------------------------------------
/*
$('#userupdate').submit(function(e){
  e.preventDefault();
  var id     =  $('#id_2').val();
  var name         =  $('#name_2').val();
  var celular    =  $('#celular_2').val();
  var email  =  $('#email_2').val();
  var id_rol  =  $('#id_rol2').val();
  var activo  = $("input[name = 'activo_2']:checked").val();
  //var img  =  $('#img_2').val();
  var _token        = $("input[name = _token]").val();


  var fd = new FormData();
  var img = $('#img_2')[0].img;
  var arregloupdate = [{id,name,celular,email,id_rol,img,activo,_token}];
  console.log("Arreglo update user.");
  console.log(arregloupdate);

  
  //$('#updatepedido')[0].reset();


  $.ajax({
    url: "{{route('userupdate')}}",
    type: "POST",
    data:{
      id:id,
      name:name,
      celular:celular,
      email:email,
      id_rol:id_rol,
      activo:activo,
      img:fd,
      _token: _token
    },
    beforeSend:function(){
      $('#btnactualizaruser').text('Actualizando.....');
      },
    success:function(response){
      if (response) {
        console.log("Actualizacion Exitosa");
        $('#btnactualizaruser').text('Si,Actualizar');
        toastr.success('Actualizacion Exitosa','Success',{timeOut:3000});
        $('#tableusers').DataTable().ajax.reload();
      }
    },
    error:function(error){
        console.table("Error de Actualizacion");
        $('#btnactualizaruser').text('Si,Actualizar');
        toastr.warning('Error de Actualizacion','Error',{timeOut:3000});
      }
  })


});
*/
$('#userupdate').submit(function(e){
  e.preventDefault();

  var id     =  $('#id_2').val();
  var name         =  $('#name_2').val();
  var celular    =  $('#celular_2').val();
  var email  =  $('#email_2').val();
  var id_rol  =  $('#id_rol2').val();
  var activo  = $("input[name = 'activo_2']:checked").val();
  var img  =  $('#img_2').val();
  var _token        = $("input[name = _token]").val();

  var arregloupdate = [{id,name,celular,email,id_rol,img,activo,_token}];
  /*var fd = new FormData();
  var img = $('#img_2')[0].img;
  var arregloupdate = [{id,name,celular,email,id_rol,img,activo,_token}];
  console.log("Arreglo update user.");
  console.log(arregloupdate);

  */
  //$('#updatepedido')[0].reset();


  $.ajax({
    url: "{{route('userupdate')}}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    beforeSend:function(){
      $('#btnactualizaruser').text('Actualizando.....');
      },
    success:function(data){
      if (data) {
        console.log("Actualizacion Exitosa");
        $('#btnactualizaruser').text('Si,Actualizar');
        toastr.success('Actualizacion Exitosa','Success',{timeOut:3000});
        $('#tableusers').DataTable().ajax.reload();
      }
    },
    error:function(error){
        console.table("Error de Actualizacion");
        $('#btnactualizaruser').text('Si,Actualizar');
        toastr.warning('Error de Actualizacion','Error',{timeOut:3000});
      }
  })


});

function desactivacion(id){
  console.log("Clave del usuario desactivacion: " +id);
  $.get('desactivaruser/'+id,function(){
    //Asignar datos en la ventana modal
    console.log("Clave del usuario seleccionado: " +id);
    toastr.success('Actualizacion Exitosa','Success',{timeOut:3000});
    $('#tableusers').DataTable().ajax.reload();

  })
}


//Desactivar
//----------------------------------------------------------------
  $(document).on('click', '.desactivaruser',function(){
/*
    fila = $(this.id);
    id = parseInt($(this).text());
    console.log(id);
*/

    //var id = this.id;
    /*var id  = parseInt(this.id);
    console.log(id);*/

    fila = $(this);
    id = parseInt($(this).closest('tr').text());
    console.table(id);

    });

  $('#btndesactivaru').click(function(){
    $.ajax({
      url: "desactivaruser/"+id,
      datatype: "json",
      beforeSend:function(){
        $('#btndesactivaru').text('Desactivando Usuario.....');
      },
      success:function(data){
        setTimeout(function(){
          toastr.warning('El Usuario se desactivo correctamente.','Desactivacion Usuario',{timeOut:3000});
          $('#tableusers').DataTable().ajax.reload();
        }, 2000);
        $('#btndesactivaru').text('Desactivar');
        console.table("Usuario con Clave: " +id+" fue Desactivado correctamente");
        $("#mdesactivaru .close").click();
      }
    });
  });


//Activar
//----------------------------------------------------------------
$(document).on('click', '.activaruser',function(){
    fila = $(this);
    id = parseInt($(this).closest('tr').text());
    console.table(id);

  });

  $('#btnactivacionuser').click(function(){

    $.ajax({

      url: "activaruser/"+id,
      datatype: "json",
      beforeSend:function(){
        $('#btnactivacionuser').text('Activando Usuario....');
      },
      success:function(data){
        setTimeout(function(){
          toastr.success('El Usuario se ha Activado correctamente.','Activacion de Usuario',{timeOut:3000});
          $('#tableusers').DataTable().ajax.reload();
        }, 2000);
        $('#btnactivacionuser').text('Si,Activar');
        console.table("Usuario con Clave: " +id+" fue Activado correctamente");
      }
    });
  });


//Eliminacion
//----------------------------------------------------------------
$(document).on('click', '.eliminaruser',function(){
    fila = $(this);
    id = parseInt($(this).closest('tr').text());
    console.log("Estoy en la funcion eliminar: "+id);

  });

  $('#btneliminacionuser').click(function(){
    console.log("Estoy procesando la eliminacion: "+id);
    $.ajax({
      url: "borraruser/"+id,
      datatype: "json",
      beforeSend:function(){
        $('#btneliminacionuser').text('Eliminando Usuario....');
      },
      success:function(data){
        console.table(data)
        toastr.warning('El Usuario  se ha Eliminado.','Sucess',{timeOut:3000});
        $('#btneliminacionuser').text('Si,Eliminar');
      }
    });
  });
        </script>
@stop


