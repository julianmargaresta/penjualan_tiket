
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Halaman Login</title>
    <link rel="apple-touch-icon" href="{{url('theme-assets/images/logo/logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('theme-assets/images/logo/logo.png')}}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('theme-assets/css/vendors.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('theme-assets/css/app-lite.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/component-login.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/palette.css')}}" />
    <!-- END: Page CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="text-center mb-1">
                            <img src="https://themeselection.com/demo/chameleon-admin-template/app-assets/images/logo/logo.png" alt="branding logo">
                    </div>
                    <div class="font-large-1  text-center">
                        Halaman Login
                    </div>
                </div>

                    @if (Session::has('message'))
                <div class="col-sm-12">
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                </div>
                @endif
                @if (Session::has('message_gagal'))
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        {{ Session::get('message_gagal') }}
                    </div>
                </div>
                @endif
                <div class="card-content">

                    <div class="card-body">
                        <form class="form-horizontal" action="login" method="post" novalidate>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control round" name="email" id="user-name" placeholder="Your Username" required>
                                <div class="form-control-position">
                                    <i class="ft-mail"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control round" name="password" placeholder="Enter Password" required>
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-sm-left">

                                </div>
                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                            </div>

                            @csrf
                            <div class="form-group text-center">
                                <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Login</button>
                            </div>

                            <div class="row">
                            <div class="col-12 ">
                                <a href="{{ url('/auth/google') }}" class="btn round btn-google col-12"></i>Login With Google</a>
                                <hr>
                               
                            </div>
                            </div>

                        </form>
                    </div>
                    
                    <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1"><span>Don't have an account ? <a href="register" class="card-link">Sign Up</a></span></p>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->
  </body>
  <!-- END: Body-->
</html>
