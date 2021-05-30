 <!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TI Universe Store</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

     <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>   

        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>

  <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>   

        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">
 @include('include.topheader')
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <center><a href="{{ url('/') }}"><img class="align-content" src="{{asset('admin/images/logo.png')}}" alt=""></a></center>
                </div>
                <div class="login-form">
                    <div>
                        <center><h1>Registro</h1></center>
                    </div>
                        <hr>
                    <form method="POST" action="{{ route('register') }}" class="formularioregistro">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}"  autocomplete="celular" autofocus>

                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirmar Password</label>
                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>






                        <div class="login-checkbox">
                                    <label>
                                        <b>Acepte el <a href="#">Aviso de privacidad</a>
                                        y los Términos de condiciones para terminar de crear su cuenta.
                                        </b>
                                        <br> 
                                        <input type="checkbox" name="aceptotc_c" id="aceptotc_c">Entiendo y Acepto el Aviso de privacidad y los Términos de condiciones
                                    </label>
                                </div>
                                <button type="submit"  id="enviar" class="btn btn-success au-btn--block " onclick="confirmar()"  disabled >
                                     <b>Registrarse</b>
                                </button>  
                        

                        <div class="register-link m-t-15 text-center">
                            <hr>
                            <p>
                                   ¿Ya tienes cuenta? 
                                    <a href="{{ route('login') }}">Inicia Sesion</a>
                                </p> 
                        </div>

                    </form>
                </div>
            </div> 
        </div> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{asset('admin/js/main.js')}}"></script>



</body>
</html>
