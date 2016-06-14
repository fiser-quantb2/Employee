<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Employee Directory is a project for Web Development subject">
  <meta name="keywords" content="employee, employee directory, material design, reponsive">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>Login</title>
  <!-- Favicons-->
  <link rel="icon" href="{{ URL::asset('images/uet_logo.png') }}" sizes="32x32">
  <!-- CORE CSS-->
  <link href="{{ URL::asset('css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ URL::asset('css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="{{ URL::asset('css/custom/custom.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ URL::asset('css/layouts/page-center.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->
  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form id="validateLogin" class="login-form" method="POST" action={{url('login')}}>
        <div class="row">
          <div class="input-field col s12 center">
            <a href="{{url('/')}}">
                <img src="{{ URL::asset('images/uet_logo.png') }}" alt="" class="circle responsive-img valign profile-image-login">
            </a>
            <p class="center login-form-text">Employee Directory</p>
          </div>
        </div>
        <form action="{{ url('login') }}" method="POST">
        @if($errors->has('errorlogin'))
          <div id="card-alert" class="card red lighten-5">
            <div class="card-content red-text">
              <p>{{$errors->first('errorlogin')}}</p>
            </div>
            <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        @endif
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <label for="username" class="center-align">Username</label>
            <input id="username" name="username" type="text" data-error='.errorTxt1'>
            <div class="errorTxt1"></div>
            @if($errors->has('username'))
              <div id="card-alert" class="card red lighten-5">
                <div class="card-content red-text">
                  <p>{{$errors->first('username')}}</p>
                </div>
                <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            @endif
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" data-error='.errorTxt2'>
            <div class="errorTxt2"></div>
             @if($errors->has('password'))
              <div id="card-alert" class="card red lighten-5">
                <div class="card-content red-text">
                  <p>{{$errors->first('password')}}</p>
                </div>
                <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            @endif
          </div>
        </div>
        
        {!! csrf_field() !!}
       <div class="row" style="margin-bottom:10px">
         <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
       </div>
       @if($errors->has('errorcaptcha'))
          <div id="card-alert" class="card red lighten-5">
            <div class="card-content red-text">
              <p>{{$errors->first('errorcaptcha')}}</p>
            </div>
            <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
      @endif
       <div class="row" style="margin-bottom:10px">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" name="remember" id="remember" />
              <label for="remember">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s8 offset-s2">
            <button id="login" type="submit" class="btn waves-effect waves-light col s12">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- jQuery Library -->
  <script type="text/javascript" src="{{ URL::asset('js/plugins/jquery-1.11.2.min.js') }}"></script>
  <!--materialize js-->
  <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
  <!--validate jquery -->
  <script type="text/javascript" src="{{URL::asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/plugins/jquery-validation/additional-methods.min.js')}}"></script>
  <!-- ReCaptcha by Gooogle -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="{{ URL::asset('js/plugins.min.js') }}"></script>
  <!--custom-script.js - Add your own theme custom JS-->
  <script type="text/javascript" src="{{ URL::asset('js/custom-script.js') }}"></script>
  <script type="text/javascript" src="{{URL::asset('js/validate/validateform.js')}}"></script>
</body>
</html>