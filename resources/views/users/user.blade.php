@extends('layouts.sistema')

@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>


<div class="titulo-reporte">
    <h1>Reporte Usuarios</h1>
</div>

<!-------------------------------------------------- Boton Agregar Modal ---------------------------------------------------------------->
<div class="content-agregar">
    <!-- Large modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Agregar</button>
    
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


<!-------------------------------------------------- Tabla de Consulta(Reporte) ---------------------------------------------------------------->

    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <center><h3 class="mb-0">Usuarios</h3></center>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Clave</th>
                    <th>Avatar</th>
                    <th>Nombre</th>

                    <th>Email</th>
                    <th>Password</th>
                    <th>Celular</th>
                                        
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="list">
                     @foreach($consulta2 as $user)
                  <tr>
                    <th scope="row">
                      {{$user->id}}
                    </th>
                    <td class="budget">
                       <div class="avatar-group">


                         <a href="#" class="rounded-circle mr-3" data-toggle="tooltip" title="{{$user->name}}">
                          <img class="img rounded" with=55 height=55 src="{{asset('archivos/'.$user->img)}}" name="img"> 
                        </a>
                        
                      </div>
                    </td>
                    <td>
                      {{$user->name}}
                    </td>
                    <td>
                     {{$user->email}}
                    </td>
                    <td>
                     
                     {{Crypt::decryptString($user->password)}}
                    </td>
                    <td>
                       {{$user->celular}}
                    </td>
                    <td>
                    @if(auth()->user()->id_rol == 1 )
                      @if($user->deleted_at)
                        <form id="activaruser" action="{{route('activaruser',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-success">Activar</button>
                        </form>
                        <form id="borraruser" action="{{route('borraruser',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-outline-danger">Eliminar</button>
                        </form>
                        @else
                        <form id="desactivaruser" action="{{route('desactivaruser',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <button type="button submit" class="btn btn-warning">Desactivar</button>
                        </form>
                        @endif 
                         <a href="{{route('editar_user',['id'=>$user->id])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                         </a>
                     @else
                      @if(auth()->user()->id_rol == 4)
                     <a href="{{route('editar_user',['id'=>$user->id])}}"><button type="button submit" class="btn btn-outline-primary"><span class="ti-pencil-alt" title="Editar">Editar</span></button>
                        </a>
                        @else
                        Sin Permisos
                     @endif   
                     @endif

                        
                    </td>

                  </tr>
   @endforeach
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>

<!-------------------------------------------------- End Tabla de Consulta(Reporte) ---------------------------------------------------------------->






<!------------------------------------------------------------------------------------------------------------------>




@stop