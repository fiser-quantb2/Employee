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
    <link rel="icon" href="{{ URL::asset('images/uet_logo.png') }}" sizes="32x32">
    <title>Employee Directory - @yield('title')</title>
    <!-- CORE CSS-->
    <link href="{{ URL::asset('css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ URL::asset('css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- DataTable CSS-->
    <link href="{{ URL::asset('js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">    
    <link href="{{ URL::asset('css/custom/custom.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <script type="text/javascript" src="{{ URL::asset('js/plugins/jquery-1.11.2.min.js') }}"></script>
    <!--materialize js-->
    <script type="text/javascript" src="{{ URL::asset('js/materialize.min.js') }}"></script>
    <!--DataTable JS -->
    <script type="text/javascript" src="{{ URL::asset('js/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/plugins/data-tables/data-tables-script.js') }}"></script>
    <!--JS codes for plugin-->
    <script type="text/javascript" src="{{ URL::asset('js/plugins.min.js') }}"></script>
    <!--Custom JS Code-->
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
    
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="{{url('/')}}" class="brand-logo darken-1"><img src="{{URL::asset('images/EmployeeLogo.png')}}" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Employee Directory"/>
                    </div>
                    <ul class="right hide-on-med-and-down" style="margin-right:35px">
                        @if(!Auth::check())
                        <li>
                            <a href="{{url('login')}}" class="btn waves-effect waves-light teal">Login</a>
                        </li>
                        @endif
                        
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

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
                        <p class="user-roal">Administrator</p>
                        @else
                        <a class="btn-flat waves-effect waves-light white-text profile-btn" href="#">Guest
                        </a>
                        <p class="user-roal">Guest</p>
                        @endif    
                    </div>
                </div>
                </li>
                @if(Auth::check())
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a id="adminactive" class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> Administration</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li id="addadminactive"><a href="{{url('admin/add')}}"><i class="mdi-content-add-circle"></i>Add admin</a>
                                    </li>
                                    <li id="changepassactive"><a href="{{url('admin/changepass')}}"><i class="mdi-action-track-changes"></i>Change pass</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="bold"><a
                @if(Auth::check())
                href="{{url('admin/employees')}}"
                @else
                href="{{url('employees')}}"
                @endif
                class="waves-effect waves-cyan"><i class="mdi-action-accessibility"></i> Employee</a>
                </li>
                <li class="bold"><a
                @if(Auth::check())
                href="{{url('admin/departments')}}"
                @else
                href="{{url('deparments')}}"
                @endif
                class="waves-effect waves-cyan"><i class="mdi-action-home"></i> Departments </a>
                <li class="bold"><a href="{{url('contact')}}" class="waves-effect waves-cyan"><i class="mdi-communication-phone"></i> Contact </a>
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