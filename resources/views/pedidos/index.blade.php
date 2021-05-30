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
        <button type="button" class="btn btn-primary" onclick="getHour()" data-toggle="modal" data-target="#agregarpedido">Nuevo Pedido</button>
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

@include('pedidos.mdesactivarp')

<!-------------------------------------------------- START Contenidos Boton Modal Activa Pedido ---------------------------------------------------------------->

@include('pedidos.eliminar')

<!-------------------------------------------------- END Contenidos Boton Modal Activa Pedido---------------------------------------------------------------->


<!-------------------------------------------------- START Contenidos Boton Modal Activa Pedido ---------------------------------------------------------------->

@include('pedidos.activar')

<!-------------------------------------------------- END Contenidos Boton Modal Activa Pedido---------------------------------------------------------------->

<!-------------------------------------------------- START Contenido Boton Modal Detalle Pedido ---------------------------------------------------------------->

@include('pedidos.detalle')

<!-------------------------------------------------- END Contenidos Boton Modal Detalle Pedido---------------------------------------------------------------->







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
        url: "{{route('pedidos.index')}}",
      },
      columns:[
          //{data: 'DT_RowIndex',name:'DT_RowIndex'},
          {data: 'id_pedido'},
          {data: 'name'},
          {data: 'total_piezas'},
          {data: 'fecha_pedido'},
          {data: 'fechaentrega_pedido'},
          {data: 'estatus'},
          {
            data: 'btn',
            name: 'btn',
            orderable:true,
            searchable:true,
            }
      ]
    });
  });
</script>


<script type="text/javascript">
//Insertar
//----------------------------------------------------------------
 $('#registropedido').submit(function(e){
    e.preventDefault();
    var id                  = $('#id').val();
    var fecha_pedido        = $('#fecha_pedido').val();
    var fechaentrega_pedido = $('#fechaentrega_pedido').val();
    var hora_pedido         = $('#hora_pedido').val();
    var _token              = $("input[name = _token]").val();
    $.ajax({
      url: "{{route('pedidos.store')}}",
      type: "POST",
      data:{
        id: id,
        fecha_pedido: fecha_pedido,
        fechaentrega_pedido: fechaentrega_pedido,
        hora_pedido: hora_pedido,
        _token: _token
      },
      beforeSend:function(){
        $('#addbutton').text('Agregando Pedido.....');
      },
      success:function(response){
        if (response) {
          $('#registropedido')[0].reset();
          toastr.success('El Registro se ingreso correctamente.','Nuevo Registro',{timeOut:3000});
          $('#addbutton').text('Agregar Pedido');
          $('#tablepedidos').DataTable().ajax.reload();
        }
      },
      error:function(error){
        console.table("Porfavor selecciona algo");   
        toastr.warning('Porfavor completa los campos','Error',{timeOut:3000});
        $('#addbutton').text('Agregar Pedido');
        //$('#precio_productoError').text(error.responseJSON.errors.precio_producto);
        //$('#cantidadError').text(error.responseJSON.errors.cantidad);
        //$('#id_productoError').text(error.responseJSON.errors.id_producto);

      }

    });
  });

   
  //Insertar
//----------------------------------------------------------------
/*
$('#definiendopedido').submit(function(e){
    e.preventDefault();

    var precio_producto = $('#preciocompra_producto').val();
    var cantidad        = $('#cantidad').val();
    //var subtotal        = $('#subtotal').val();
    var id_pedido       = $('#id_pedido2').val();
    var id_producto     = $('#id_producto').val();
    var seleccionado = $("#id_producto option:selected").html();
    var _token2          = $("input[name = _token]").val();

    //Tabla productos definicion
         
    var arreglo = [{precio_producto,seleccionado,cantidad,'subtotal':'2',id_pedido,id_producto,_token2}];

    console.log(arreglo);
       
        buildTable(arreglo)

        function buildTable(data){
          var table = document.getElementById('tabledefiniendo')

          for (var i = 0; i < data.length; i++) {
            var row = `<tr>
                          <td>${data[i].id_producto}</td>
                          <td>${data[i].seleccionado}</td>
                          
                          <td>${data[i].precio_producto}</td>
                          <td>${data[i].cantidad}</td>
                          <td class="sub">${data[i].subtotal}</td>
                          
                          
                          <td><center><button type="button" name="eliminarprod"  id="'.$data2->id_detallepedido.'" class="eliminarprod btn btn-danger  btn-sm" data-toggle="modal" data-target="#mborrarprod">Eliminar</button></center></td>  
                      </tr>`
            table.innerHTML+= row
          }
        }

  });
  
  */

   

    //Insertar
//----------------------------------------------------------------
$('#definiendopedido').submit(function(e){
    e.preventDefault();

    var precio_producto = $('#preciocompra_producto').val();
    var cantidad        = $('#cantidad').val();
    var subtotal        = $('#subtotal').val();
    var id_pedido       = $('#id_pedido2').val();
    var id_producto     = $('#id_producto').val();
    var seleccionado    = $("#id_producto option:selected").html();
    var _token         = $("input[name = _token]").val();
    var arreglovalor = [{precio_producto,cantidad,subtotal,id_pedido,id_producto,_token}];
    
    console.log("Arreglo valor: ");
    console.log(arreglovalor);


    $.ajax({
      url: "{{route('pedidos.storep')}}",
      type: "POST",
      data:{ 
        precio_producto: precio_producto,
        cantidad: cantidad,
        subtotal: subtotal,
        id_pedido: id_pedido,
        id_producto: id_producto,
        _token: _token 
      },
      beforeSend:function(){

        $('#btnagregarproduct').text('Agregando.....');
      },
      success:function(response){
        if (response) {
          
    //Tabla productos definicion
    var arreglo = [{id_producto,seleccionado,precio_producto,cantidad,subtotal}];

    console.log("Arreglo tabla pedido: ");
    console.log(arreglo);
       
        buildTable(arreglo)

        function buildTable(data){
          var table = document.getElementById('tabledefiniendo')

          for (var i = 0; i < data.length; i++) {
            var row = `<tr>
                          <td>${data[i].id_producto}</td>
                          <td>${data[i].seleccionado}</td>
                          
                          <td>${data[i].precio_producto}</td>
                          <td class="cant">${data[i].cantidad}</td>
                          <td class="sub">${data[i].subtotal}</td>
                          
                          
                          <td><center><button type="button" name="eliminarprod"  id="'.$data2->id_detallepedido.'" class="eliminarprod btn btn-danger  btn-sm" data-toggle="modal" data-target="#mborrarprod">Eliminar</button></center></td>  
                      </tr>`
            table.innerHTML+= row
          }
        }
          $('#definiendopedido')[0].reset();
          cleardata();
          toastr.success('El Producto se ingreso correctamente.','Nuevo Producto',{timeOut:3000});
          $('#btnagregarproduct').text('Agregar');    
          console.table("Producto Agregado al pedido");   
        }

      },
      error:function(error){
        console.table("Porfavor selecciona un producto");   
        toastr.warning('Porfavor selecciona un producto','Error',{timeOut:3000});
        $('#btnagregarproduct').text('Agregar'); 
        $('#precio_productoError').text(error.responseJSON.errors.precio_producto);
        $('#cantidadError').text(error.responseJSON.errors.cantidad);
        $('#id_productoError').text(error.responseJSON.errors.id_producto);

      }
    });

  });


//Actualizar
//----------------------------------------------------------------





$('#finalizarpedido').click(function(){
  console.log("Envie formulario update .");
  $("#updatepedido").submit();
});
  


$('#updatepedido').submit(function(e){
  e.preventDefault();
  var id_pedido     =  $('#id_pedido2').val();
  var total         =  $('#total1').val();
  var total_piezas  =  $('#total_piezas').val();
  var _token        = $("input[name = _token]").val();

  var arregloupdate = [{id_pedido,total,total_piezas,_token}];

  console.log("Arreglo update pedido.");
  console.log(arregloupdate);

  //$('#updatepedido')[0].reset();


  $.ajax({
    url: "{{route('pedidos.update')}}",
    type: "POST",
    data:{
      id_pedido:id_pedido,
      total:total,
      total_piezas:total_piezas,
      _token: _token
    },
    success:function(response){
      if (response) {
        $('#finalizarpedido').attr('disabled',true);
        $('#calcular').attr('disabled',true);
        console.table("Actualizacion Exitosa");   
        toastr.success('Actualizacion Exitosa','Success',{timeOut:3000});
        $('#tablepedidos').DataTable().ajax.reload();
      }
    },
    error:function(error){
        console.table("Error de Actualizacion");   
        toastr.warning('Error de Actualizacion','Error',{timeOut:3000});
      }
  })


});




//Hora
function getHour(){
    var h = new Date();
    var hours = ((h.getHours() < 10) ? "0" : "") + h.getHours();
    var minutes = ((h.getMinutes() < 10) ? "0" : "") + h.getMinutes();
    var secs = ((h.getSeconds() < 10) ? "0" : "") + h.getSeconds();

    //console.log("Hora actual: " + hours + ":" + minutes + ":" + secs);

    $('#hora_pedido').attr("value",hours + ":" + minutes + ":" + secs);

}

getHour();

//Desactivar
//----------------------------------------------------------------
  $(document).on('click', '.desactivarpedido',function(){
    fila = $(this);
    pedido = parseInt($(this).closest('tr').text());
    console.table(pedido);
    
   });

  $('#btndesactivarp').click(function(){
    
    $.ajax({

      url: "pedidos/desactivarpedido/"+pedido,
      
      datatype: "json",
      
      
      beforeSend:function(){
        $('#btndesactivarp').text('Desactivando Pedido.....');
      },
      success:function(data){
        setTimeout(function(){
          toastr.warning('El Pedido se desactivo correctamente.','Desactivacion Pedido',{timeOut:3000});
          $('#tablepedidos').DataTable().ajax.reload();
        }, 2000);
        $('#btndesactivarp').text('Desactivar');
        console.table("Pedido con Clave: " +pedido+" fue Desactivado correctamente");
        $("#mdesactivarp .close").click();
      }
    });
  });

//Eliminacion
//----------------------------------------------------------------
  $(document).on('click', '.eliminarpedido',function(){
    fila = $(this);
    id_pedido = parseInt($(this).closest('tr').text());
    console.log("Estoy en la funcion eliminar: "+id_pedido);
    
   });

  $('#btneliminacionp').click(function(){
    console.log("Estoy procesando la eliminacion: "+id_pedido);
    
    $.ajax({

      url: "pedidos/eliminarpedido/"+id_pedido,
      
      datatype: "json",
      
      
      beforeSend:function(){
        $('#btneliminacionp').text('Eliminando Pedido....');
      },
      success:function(data){
        console.table(data)
        //console.log(data.id_pedido);

        //var verificando = 

        if (data == id_pedido ) {
          console.log("Hola desde el if de eliminar");
          
          /*setTimeout(function(){
            toastr.warning('El Pedido se ha Eliminado correctamente.','Eliminacion de Pedido',{timeOut:3000});
            $('#tablepedidos').DataTable().ajax.reload();
          }, 2000);
          $('#btneliminacionp').text('Si,Eliminar');
          console.log("Pedido con Clave: " +id_pedido+" fue Eliminado correctamente");
          */
        }
        else{
          console.log("Hola desde else");
          toastr.warning('El Pedido No se ha Eliminado.','Error',{timeOut:3000});
          $('#btneliminacionp').text('Si,Eliminar');
          console.log("Error al eliminar el Pedido con Clave: " +id_pedido);
        }



      }
    });
  });

  /*

var products = [
  { id: 1, name: "Leche", price: 120, categories: ["familiar", "comida"] },
  { id: 2, name: "Arroz", price: 80, categories: ["familiar", "comida"] },
  { id: 3, name: "Lavadora", price: 7800, categories: ["electrodomésticos"] }
];

console.log(products);

for (var i=0; i < products.length; i++) {
  var product = products[i];
  console.log(product);
  console.log(product.name);
  console.log("  Id: " + product.id);
  console.log("  Precio: " + product.price);
  console.log("  Categorías: " + product.categories.join(", "));
}
*/
//Activar
//----------------------------------------------------------------
  $(document).on('click', '.activarpedido',function(){
    fila = $(this);
    id_pedido = parseInt($(this).closest('tr').text());
    console.table(id_pedido);
    
   });

  $('#btnactivacionp').click(function(){
    
    $.ajax({

      url: "pedidos/activarpedido/"+id_pedido,
      
      datatype: "json",
      
      
      beforeSend:function(){
        $('#btnactivacionp').text('Activando Pedido....');
      },
      success:function(data){
        setTimeout(function(){
          toastr.success('El Pedido se ha Activado correctamente.','Activacion de Pedido',{timeOut:3000});
          $('#tablepedidos').DataTable().ajax.reload();
        }, 2000);
        $('#btnactivacionp').text('Si,Activar');
        console.table("Pedido con Clave: " +id_pedido+" fue Activado correctamente");
      }
    });
  });
 

//Editar pedido
//----------------------------------------------------------------


function editpedido(id_pedido){
  console.log("Clave del pedido seleccionado: " +id_pedido);
  $.get('pedidos/edit/'+id_pedido,function(data){
    //Asignar datos en la ventana modal
    console.table("Clave del pedido seleccionado: " +id_pedido);
    console.table(data);
    $('#id_pedido2').val(id_pedido);
    $('#id2').val(data.id);
    $('#fecha_pedido2').val(data.fecha_pedido);
    $('#hora_pedido2').val(data.hora_pedido);
    if (data.estatus == "Sin Definir") {
    $("#calcular").removeAttr("disabled");
  }

  })
  
}

//Show pedido
//----------------------------------------------------------------
 

function showpedido(id_pedido){
  console.log("Clave del pedido para mostrar: " +id_pedido);
  $.get('pedidos/show/'+id_pedido,function(data){
    //Asignar datos en la ventana modal
    //console.table("Clave del pedido para mostrar: " +id_pedido);
    //console.table(data);
    console.table(data);
    $('#id4').val(data.id_pedido);
    $('#id3').val(data.id);
    $('#fecha_pedido3').val(data.fecha_pedido);
    $('#hora_pedido3').val(data.hora_pedido);
    $('#total').val(data.total);
    $('#totalspan').text(data.total);

  })
  $.get('pedidos/show2/'+id_pedido,function(data){
    console.table(data); 

   var x =0;
   console.log("Hola soy el valor inicial de x : " +x);
    for (var i = 0; i < data.length; i++) {
            var x = data[i].estatus;
            console.log(x);

          }
  
            console.log("Hola soy new: " +x);

    if (x == "En Proceso") {
      console.log("el valor es 1");
      $('#liberar').attr('hidden', false)
    }
    else{
      console.log("el valor fue LBS");
      $('#liberar').attr('hidden', true)
      
    }

    var table = document.getElementById('tabledetalle')

          for (var i = 0; i < data.length; i++) {
            var row = `<tr>
                          <td>${data[i].id_pedido}</td>
                          <td>${data[i].id_producto}</td>
                          <td>${data[i].nombre_producto}</td>
                          <td>${data[i].nombre_marca}</td>
                          <td>${data[i].precio_producto}</td>
                          <td>${data[i].cantidad}</td>
                          <td>${data[i].subtotal}</td>
                      </tr>`
            table.innerHTML+= row
          }

  })
 


}



//Seleccion Producto
//----------------------------------------------------------------
$(document).on("change",".selectprod",function(){
    
    var id_producto = $("#id_producto").val();
    console.log("Clave del Producto seleccionado: "+id_producto);
    
    $.get('pedidos/seleccionado/'+id_producto,function(data){
    //Asignar datos en campo precio
    console.log("Estoy en precio");


    console.log("Clave seleccionado: " +id_producto);
    console.table(data);
    $('#preciocompra_producto').val(data.preciocompra_producto);
     })


  }); 



 
//Clear
//----------------------------------------------------------------

function cleardata(){

    $('#precio_productoError').text('');
    $('#cantidadError').text('');
    $('#id_productoError').text('');
    $('#subtotal').attr("value","");
    $('#total1').attr("value","");
    $('#total_piezas').attr("value","");
    //alert("Hola lbs");
}




//Subtotal
//----------------------------------------------------------------
$("#cantidad").on('click',function(){

  

  var nprecio   = $('#preciocompra_producto').val();

  var ncantidad = $('#cantidad').val();
  
  var sub = 0;

  sub = nprecio * ncantidad;


  $('#subtotal').attr("value",sub);


});






//Cerrar
//----------------------------------------------------------------
$("#cerrar").on('click',function(){
  console.log("Clear modal definir");
  cleardata();
  $('#definiendopedido')[0].reset();
  //Limpio la tabla productos
  $("#tabledefiniendo").children().remove()
});


//Cerrar2
//----------------------------------------------------------------
$("#cerrar2").on('click',function(){
  console.log("Clear table productos");
  //Limpio la tabla productos
  $("#tabledetalle").children().remove()
});



//Calcular
//----------------------------------------------------------------

$("#calcular").click(function(){
  console.log("Estoy en calculando");
  var total = 0;
  var totalpiezas =0;
        $(".sub").each(function(){
          console.log("Estoy en ech sub");
          console.log("primero: "+$(this).text())
          //total += ($(this).text());
          total +=  parseFloat($(this).text());    
          console.log(total)
        });
        $(".cant").each(function(){
          console.log("Estoy en ech cantidad piezas");
          console.log("primero: "+$(this).text())
          
          totalpiezas +=  parseFloat($(this).text());    
          console.log(totalpiezas)
        });
  

  if (total > 0 && totalpiezas > 0 ) {
    $('#total1').attr("value","$ "+total);
    $('#total_piezas').attr("value",totalpiezas);
    $("#finalizarpedido").removeAttr("disabled");
  }
  else{
    toastr.warning('No Se ha Agregado ningun producto.','Error',{timeOut:3000});
    console.log("No Se ha Agregado ningun producto");
  }

});   



</script>
<!------------------------------------------------------------------------------------------------------------------>
@stop