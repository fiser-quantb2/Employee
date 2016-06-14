<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Employee Directory - @yield('title')</title>

    <!-- Favicons-->
    <link rel="icon" href="{{ URL::asset('images/favicon/favicon-32x32.png') }}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('images/favicon/apple-touch-icon-152x152.png') }}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{ URL::asset('images/favicon/mstile-144x144.png') }}">
    <!-- For Windows Phone -->
    
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{URL::asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{URL::asset('js/plugins/data-tables/css/jquery.dataTables.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- CORE CSS-->
  
    <link href="{{ URL::asset('css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ URL::asset('css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{ URL::asset('css/custom/custom.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
     <script type="text/javascript" src="{{ URL::asset('js/plugins/jquery-1.11.2.min.js') }}"></script>



    <!--materialize js-->
    <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
    <!--prism-->
    <script type="text/javascript" src="{{ URL::asset('js/plugins/prism/prism.js') }}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{ URL::asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    
    <!-- data-tables -->
    <script type="text/javascript" src="{{URL::asset('js/plugins/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/plugins/data-tables/data-tables-script.js')}}"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ URL::asset('js/plugins.min.js') }}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{ URL::asset('js/custom-script.js') }}"></script>
</head>
<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="{{ URL::asset('images/materialize-logo.png')}}" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1></li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src="{{ URL::asset('images/avatar.png') }}" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="{{url('logout')}}"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                            </li>
                        </ul>
                        @if( Auth::check() )
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{ Auth::user()->username }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <p class="user-roal">Administration</p>
                        @else
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">Guest<i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <p class="user-roal">Guest</p>
                        @endif    
                    </div>
                </div>
                </li>
                <li class="bold"><a href="{{url('admin/employees')}}" class="waves-effect waves-cyan"><i class="mdi-action-accessibility"></i> Employee</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a href="{{url('admin')}}" class="waves-effect waves-cyan"><i class="mdi-social-group"></i> Administration</a>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="{{url('admin/departments')}}" class="waves-effect waves-cyan"><i class="mdi-action-home"></i> Departments </a>
                </li>
                <li class="li-hover">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="sample-chart-wrapper">                            
                                <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                @yield('content')
                <!--end container-->
            </section>
            <!-- END CONTENT -->

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2016 <a class="grey-text text-lighten-4" href="#" target="_blank">Team UET</a> All rights reserved.
                <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">Team UET</a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->
</body>


</html>