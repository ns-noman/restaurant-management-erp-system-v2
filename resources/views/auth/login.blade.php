<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('frontend') }}/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="{{ asset('admin') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="{{ asset('admin') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="{{ asset('admin') }}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{ asset('admin') }}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('admin') }}/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet" />
  <link href="{{ asset('admin') }}/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" /


  <!-- loader-->
	<link href="{{ asset('admin') }}/css/pace.min.css" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="{{ asset('admin') }}/css/dark-theme.css" rel="stylesheet" />
  <link href="{{ asset('admin') }}/css/light-theme.css" rel="stylesheet" />
  <link href="{{ asset('admin') }}/css/semi-dark.css" rel="stylesheet" />
  <link href="{{ asset('admin') }}/css/header-colors.css" rel="stylesheet" />


  <title> Login - Wooden Spoon </title>
<body>

  <!--start wrapper-->
  <div class="wrapper">

       <!--start content-->
       <main class="authentication-content">
        <div class="container-fluid">
          <div class="authentication-card">
            <div class="card shadow rounded-0 overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                  <img src="{{ asset('admin') }}/images/error/login-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title">Sign In</h5>
                    <p class="card-text mb-5">See your growth and get consulting support!</p>
                    <form class="form-body" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row g-3">
                          <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                              <input type="email" name="email" value="{{ old('email') }}" class="form-control radius-30 ps-5" id="inputEmailAddress" placeholder="Email Address">
                              <div class="text-danger">{{ $errors->first('email') }}</div>
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                              <input type="password"  name="password" value="{{ old('password') }}" class="form-control radius-30 ps-5" id="inputChoosePassword" placeholder="Enter Password">
                              <div class="text-danger">{{ $errors->first('password') }}</div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                              <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                            </div>
                          </div>
                          <div class="col-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                              <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                            </div>
                          </div>

                        </div>
                    </form>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </main>

       <!--end page main-->

  </div>
  <!--end wrapper-->

  <!-- Bootstrap bundle JS -->
  <script src="{{ asset('admin') }}/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="{{ asset('admin') }}/js/jquery.min.js"></script>
  <script src="{{ asset('admin') }}/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="{{ asset('admin') }}/plugins/metismenu/js/metisMenu.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.0.8/sweetalert.min.js" integrity="sha512-fcAEThGLlyTKt+mmcRprds9PxumnuZukst32LxyzgU8ga0jKzlHCHawCo+eynUAgrHpuUe1QGSHe6X6cXYcZAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!--app-->
  <script src="{{ asset('admin') }}/js/app.js"></script>
  <script src="{{ asset('admin') }}/js/index.js"></script>

  @yield('js')


      <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
            }
        @endif

    </script>

