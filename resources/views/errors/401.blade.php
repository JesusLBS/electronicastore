<!DOCTYPE html>
<html>
<head>
  <title>Unauthorized</title>
  <script type = "text/javascript" src = "jquery-3.3.1.js"> </script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
         <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>



  <style type="text/css">
   
body {
  padding: 0;
  margin: 0;
}
#notfound {
  position: relative;
  height: 100vh;
  background: #030005;
}
#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}
.notfound {
  max-width: 767px;
  width: 100%;
  line-height: 1.4;
  text-align: center;
}
.notfound .notfound-404 {
  position: relative;
  height: 180px;
  margin-bottom: 20px;
  z-index: -1;
}
.notfound .notfound-404 h1 {
  font-family: 'Montserrat', sans-serif;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50% , -50%);
      -ms-transform: translate(-50% , -50%);
          transform: translate(-50% , -50%);
  font-size: 224px;
  font-weight: 900;
  margin-top: 0px;
  margin-bottom: 0px;
  margin-left: -12px;
  color: #030005;
  text-transform: uppercase;
  text-shadow: -1px -1px 0px #8400ff, 1px 1px 0px #ff005a;
  letter-spacing: -20px;
}
.notfound .notfound-404 h2 {
  font-family: 'Montserrat', sans-serif;
  position: absolute;
  left: 0;
  right: 0;
  top: 110px;
  font-size: 42px;
  font-weight: 700;
  color: #fff;
  text-transform: uppercase;
  text-shadow: 0px 2px 0px #8400ff;
  letter-spacing: 13px;
  margin: 0;
}
.notfound a {
  font-family: 'Montserrat', sans-serif;
  display: inline-block;
  text-transform: uppercase;
  color: #ff005a;
  text-decoration: none;
  border: 2px solid;
  background: transparent;
  padding: 10px 40px;
  font-size: 14px;
  font-weight: 700;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}
.notfound a:hover {
  color: #8400ff;
}
@media only screen and (max-width: 767px) {
    .notfound .notfound-404 h2 {
        font-size: 24px;
    }
}
@media only screen and (max-width: 480px) {
  .notfound .notfound-404 h1 {
      font-size: 182px;
  }
}
  </style>
</head>
<body>
<!------------------------------------------------------------*----------------------------------------------------------->
@include('include.topheader')
<!------------------------------------------------------------*----------------------------------------------------------->
<div id="notfound">
<div class="notfound">
<div class="notfound-404">
<h1>401</h1>
<h2>This Action is Unauthorized</h2>
</div>
<a href="{{ url('/') }}">TI Universe Store</a>
</div>
</div>
<!---------------------------------------------------------------*------------------------------------------------------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>