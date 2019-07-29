<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Moviex - Dashboard</title>
    <link rel="apple-touch-icon" href="{{url('theme-assets/ s/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('theme-assets/images/ico/favicon.ico')}}">

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('theme-assets/css/vendors.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('theme-assets/css/app-lite.css')}}">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('theme-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('theme-assets/css/core/colors/palette-gradient.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <script src="{{url('assets/js/jquery/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="collapse navbar-collapse show" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                            <ul class="dropdown-menu">
                                <li class="arrow_box">
                                    <form>
                                        <div class="input-group search-box">
                                            <div class="position-relative has-icon-right full-width">
                                                <input class="form-control" id="search" type="text" placeholder="Search here...">
                                                <div class="form-control-position navbar-search-close"><i class="ft-x"> </i></div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                                  class="selected-language"></span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                                <div class="arrow_box"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item"
                                      href="#"><i class="flag-icon flag-icon-ru"></i> Russian</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i
                                          class="flag-icon flag-icon-es"></i> Spanish</a></div>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail"> </i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><i class="ft-book"></i> Read Mail</a><a class="dropdown-item" href="#"><i class="ft-bookmark"></i> Read Later</a><a class="dropdown-item" href="#"><i
                                          class="ft-check-square"></i> Mark all Read </a></div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"> <span class="avatar avatar-online"><img
                                      src="{{url('theme-assets/images/portrait/small/avatar-s-19.png')}}" alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="{{url('theme-assets/images/portrait/small/avatar-s-19.png')}}" alt="avatar"><span
                                              class="user-name text-bold-700 ml-1">John Doe</span></span></a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item"
                                      href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="{{url('theme-assets/images/backgrounds/02.jpg')}}">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="{{url('theme-assets/images/logo/logo.png')}}" />
                        <h3 class="brand-text">Chameleon</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>

        @if(Auth::user()->role == "admin")

        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" nav-item"><a href="/home"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="/user"><i class="ft-users"></i><span class="menu-title" data-i18n="">User</span></a>
                </li>
                <li class=" nav-item"><a href="/genre"><i class="ft-list"></i><span class="menu-title" data-i18n="">Genre</span></a>
                </li>
                <li class=" nav-item"><a href="/studio"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Studio</span></a>
                </li>
                <li class=" nav-item"><a href="/film"><i class="ft-video"></i><span class="menu-title" data-i18n="">Film</span></a>
                </li>
                <li class=" nav-item"><a href="/order"><i class="ft-file-text"></i><span class="menu-title" data-i18n="">Order</span></a>
                </li>
                <li class=" nav-item"><a href="/logout"><i class="ft-log-out"></i><span class="menu-title" data-i18n="">Logout</span></a>
                </li>
            </ul>
        </div>

        @else
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="/dashboard"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="/orderuser"><i class="ft-box"></i><span class="menu-title" data-i18n="">Order</span></a>
                </li>
                <li class="nav-item"><a href="/logout"><i class="ft-log-out"></i><span class="menu-title" data-i18n="">Logout</span></a>
                </li>
            </ul>
        </div>
        @endif

    </div>
    </div>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
