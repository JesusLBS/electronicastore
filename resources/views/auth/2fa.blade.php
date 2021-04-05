<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">
 @include('include.topheader')



 

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div> 
              <center><a href="{{ url('/') }}"><img class="align-content" src="{{asset('admin/images/logo.png')}}" alt=""></a></center>
            </div>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('login.2fa',$user->id) }}" aria-label="{{ __('Login') }}" enctype="multipart/form-data">
              @method('POST')
              @csrf
              <div class="form-group row">
                <div class="col-lg-4">
<div style="float: left;">
     {!! $urlQR !!}
</div>



                </div>
                <div class="col-lg-8" style="float: left;">
                  <label style="text-align: left;">
                    {{ __('Escanea el codigo QR') }}
                  </label>
                </div>

                <div class="col-lg-8">
                  <hr>
                  <div class="form-group">
                    <label for="code_verification" class="col-form-label">
                      {{ __('CÓDIGO DE VERIFICACIÓN QR') }}
                    </label>

                    <input 
                      id="code_verification" 
                      type="text" 
                      class="form-control{{ $errors->has('code_verification') ? ' is-invalid' : '' }}" 
                      name="code_verification"
                      value="" 
                      required
                      autofocus>
                    @if ($errors->has('code_verification'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('code_verification') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div >
                    <center>
                          <button type="submit" class="btn btn-outline-primary">ENVIAR</button>
                    </center>
                  </div>

                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
  