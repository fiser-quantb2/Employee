<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>Change Password</title>

  <!-- Favicons-->
  <link rel="icon" href="{{ URL::asset('images/favicon/favicon-32x32.png') }}" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('images/favicon/apple-touch-icon-152x152.png') }}">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="{{ URL::asset('images/favicon/mstile-144x144.png') }}">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="{{ URL::asset('css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ URL::asset('css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="{{ URL::asset('css/custom/custom.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ URL::asset('css/layouts/page-center.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="{{ URL::asset('js/plugins/prism/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ URL::asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  
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
        <h4 class="header2">Change password</h4>
        <p>This is a first login. Please change password !</p>
        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <i class="mdi-action-lock-outline prefix"></i>
                <input id="newpass" type="password" name="newpass" class="validate">
                <label for="newpass">New Password</label>
              </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <button id="change" class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                    <i class="mdi-content-send right"></i>
                  </button>
                </div>
            </div>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="{{ URL::asset('js/plugins/jquery-1.11.2.min.js') }}"></script>
  <!--materialize js-->
  <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
  <!--prism-->
  <script type="text/javascript" src="{{ URL::asset('js/plugins/prism/prism.js') }}"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="{{ URL::asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ URL::asset('js/plugins.min.js') }}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{ URL::asset('js/custom-script.js') }}"></script>
    <script>
    $(function() {
        $('#change').click(function(e) {
          e.preventDefault();
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
          });
          $.ajax({
              'url' : 'changepass',
              'data': {
                'newpass' : $('#newpass').val()
              },
              'type' : 'POST',
              success: function (data) {
                console.log(data.message);
                if (data.error == true) {
                  if (data.message.newpass != undefined) {
                    Materialize.toast(data.message.newpass[0],4000);
                  }
                } else {
                  window.location.href = "http://localhost/employee/public/admin"
                }
              }
            });
        })
      });
    </script>
</body>

</html>