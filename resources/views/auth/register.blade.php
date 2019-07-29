
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
    <title>Register Pelanggan</title>
    <link rel="apple-touch-icon" href="{{url('theme-assets/images/logo/logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('theme-assets/images/logo/logo.png')}}">
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
        <div class="content-body">
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                        <div class="card-header border-0">
                            <div class="text-center mb-1">
                                <img src="{{url('theme-assets/images/logo/logo.png')}}" alt="branding logo">
                            </div>
                            <div class="font-large-1  text-center">
                                Become A Member
                            </div>
                        </div>
                        <div class="card-content">

                            <div class="card-body">
                                <form class="form-horizontal" id="formRegister">
                                    @csrf
                                    <center>
                                    <div class="" id="alert"></alert>
                                    </center>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control round" name="name" id="name" placeholder="Your Name" required>
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="email" class="form-control round" name="email" id="email" placeholder="Your Email Address" required>
                                        <div class="form-control-position">
                                            <i class="ft-mail"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="number" class="form-control round" name="phone" id="phone" placeholder="Your Phone Address" required>
                                        <div class="form-control-position">
                                            <i class="ft-phone"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control round" name="password" id="password" placeholder="Enter Password" required>
                                        <div class="form-control-position">
                                            <i class="ft-lock"></i>
                                        </div>
                                    </fieldset>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Register</button>
                                    </div>

                                </form>
                            </div>

                            <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                                <span>Already a member ?
                                    <a href="login" class="card-link">Sign In</a>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    <script src="{{url('assets/js/jquery/jquery-3.3.1.min.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
      $(function () {
        $('#formRegister').on('submit',function (e) {
          //agar saat submit form tidak reload
          e.preventDefault();
          $.ajax({
            type:'post',
            url: 'api/register',
            data: $('#formRegister').serialize(),
            success: function (resp) {
              if (resp.status == 200) {
                $('#alert').html('Register Berhasil');
                  $('#alert').addClass('alert alert-success');
              }else{
                $('#alert').html('Akun gagal dibuat, silahkan ulangi lagi');
                  $('#alert').addClass('alert alert-success');
              }
            },
            error:function (request, status,error) {
              alert(error);
              
            }

          });
        });
      });
    </script>

  </body>
  <!-- END: Body-->
</html>
