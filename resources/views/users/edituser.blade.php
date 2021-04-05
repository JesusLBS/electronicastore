@extends('layouts.sistema')


@section('contenido')
<!------------------------------------------------------------------------------------------------------------------>
 







 



  <div class="content">
                <div class="animated fadeIn" style=" margin-left: 15%; margin-right: 8%;">


                <div class="row">
                <div class="col-lg-11">
                        <div class="card">
                            <div class="card-header text-center">
                                <strong class="card-title">Modificacion Usuario</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">{{$datauser['name']}}</h3>
                                        </div>
                                        <hr>
                                        <form action = "{{route('updateuser')}}" method = "POST" enctype="multipart/form-data">
                    @method('POST')  
                    {{csrf_field()}}                    
<br>
<br> 
                       <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Foto del  Usuario:</label>
                                                   

                            <div class="col-md-6">
               
               <img class="imgperfil rounded" width=200 height=200 src="{{asset('archivos/'.$datauser->img)}}" name="img">  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Clave Usuario:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco"></label>                         

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" value="{{$datauser['id']}}" readonly="readonly" name="id"  required autocomplete="id" autofocus >
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre Usuario:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{$datauser['name']}}" name="name"  required autocomplete="name" autofocus>
                            @if($errors->first('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                            @endif
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Celular:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control" value="{{$datauser['celular']}}" name="celular"  required autocomplete="celular" autofocus>
                            @if($errors->first('celular'))
                            <p class="text-danger">{{$errors->first('celular')}}</p>
                            @endif
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Email:</label>
                            <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>

                            

                            <div class="col-md-6">
                                <input id="emal" type="email" class="form-control" value="{{$datauser['email']}}" name="email"  required autocomplete="email" autofocus>
                            @if($errors->first('emal'))
                            <p class="text-danger">{{$errors->first('emal')}}</p>
                            @endif
                            </div>
                        </div> 
                        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 form-group">
                <label for="activo">Activo:</label>
               
                @if($datauser->activo=='0')
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="activo"  value="1"" class="custom-control-input" >
                <label class="custom-control-label" for="sexo1">Si</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="activo" value="0"" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo2">No</label>
                </div>
                @else
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="activo"  value="1"" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Si</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="activo" value="0"" class="custom-control-input">
                <label class="custom-control-label" for="sexo2">No</label>
                </div>
                @endif


            </div>
            <div class="form-group">
                <label for="dni">Tipo de Usuario:
                  
                </label>
                <select name = 'id_rol' class="custom-select">
                  <option value="{{$datauser->id_rol}}">{{$datauser->rolusers}}</option>
                  @foreach($rol as $rolusers)
                  <option value="{{$rolusers->id_estado}}">{{$rolusers->rol}}</option>
                  @endforeach
                   
                </select>
              </div> 
        </div>

                <div class="form-group">
                    <label for="img">Actualizar Foto perfil:
                      @if($errors->first('img'))
                      <p class="text-danger">{{$errors->first('img')}}</p>
                      @endif
                    </label>
                    <input type="file" name="img" id="img"  value="{{old('img')}}" class="form-control" tabindex="">
                </div>

        


<br>
<br> 
<br>
<br> 
              
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                     Actualizar
                                </button>
                                <a href="{{route('user')}}">
                                <button type="button" class="btn btn-outline-danger font-weight-bold">Regresar
                                </button>
                               </a>
                            </div> 
                        </div>
                    </form>
                                    </div>
                                </div>
 </div>
                                </div>
                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->
    </div><!-- .content -->
<!------------------------------------------------------------------------------------------------------------------>
@stop