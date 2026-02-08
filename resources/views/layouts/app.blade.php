<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('frontend') }}/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="{{ asset('frontend') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="{{ asset('frontend') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="{{ asset('frontend') }}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('frontend') }}/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet" />
  <link href="{{ asset('frontend') }}/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


  <!-- loader-->
	<link href="{{ asset('frontend') }}/css/pace.min.css" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="{{ asset('frontend') }}/css/dark-theme.css" rel="stylesheet" />
  <link href="{{ asset('frontend') }}/css/light-theme.css" rel="stylesheet" />
  <link href="{{ asset('frontend') }}/css/semi-dark.css" rel="stylesheet" />
  <link href="{{ asset('frontend') }}/css/header-colors.css" rel="stylesheet" />

  <title>Dashboard - Company File Management - Magura Group </title>
<body>

      <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
      <header class="top-header">
        <nav class="navbar navbar-expand gap-3">
          <div class="mobile-toggle-icon fs-3">
              <i class="bi bi-list"></i>
            </div>
            <form class="searchbar">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                <input class="form-control" type="text" placeholder="Type here to search">
                <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
            </form>
            <div class="top-navbar-right ms-auto">
              <ul class="navbar-nav align-items-center">
                <li class="nav-item search-toggle-icon">
                  <a class="nav-link" href="#">
                    <div class="">
                      <i class="bi bi-search"></i>
                    </div>
                  </a>
              </li>


            <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                  <div class="notifications">
                    <span class="notify-badge">8</span>
                    <i class="bi bi-bell-fill"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end p-0">
                  <div class="p-2 border-bottom m-2">
                      <h5 class="h5 mb-0">Notifications</h5>
                  </div>

                 <div class="p-2">
                   <div><hr class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">
                       <div class="text-center">View All Notifications</div>
                     </a>
                 </div>
                </div>
              </li>
              </ul>
              </div>
        </nav>
      </header>
       <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="{{ asset('frontend') }}/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
              <h4 class="logo-text">BATL</h4>
            </div>
            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
          </div>
          <!--navigation-->
          <ul class="metismenu" id="menu">
            <li>
              <a href="{{ route('home') }}">
              <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
              </a>
            </li>
            <li>
              <a href="{{route('group.index') }}">
                <div class="parent-icon"><i class="bi bi-file-earmark-spreadsheet-fill"></i>
                </div>
                <div class="menu-title">Group</div>
              </a>
            </li>
            <li>
              <a href="{{ route('company.index') }}" >
                <div class="parent-icon"><i class="bi bi-file-earmark-spreadsheet-fill"></i>
                </div>
                <div class="menu-title">Company</div>
              </a>
            </li>
            <li>
              <a href="{{ route('documenttype.index') }}" >
                <div class="parent-icon"><i class="bi bi-file-earmark-spreadsheet-fill"></i>
                </div>
                <div class="menu-title">Document Type</div>
              </a>
            </li>

            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-file-fill"></i>
                </div>
                <div class="menu-title">Documents</div>
              </a>
              <ul>
                <li> <a href="{{ route('document.create') }}"><i class="bi bi-circle"></i>Add new Document</a>
                </li>
                <li> <a href="{{ route('document.index') }}"><i class="bi bi-circle"></i>Document List</a>
                </li>
              </ul>
            </li>
            <li>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           <div class="parent-icon"><i class="bi bi-patch-exclamation-fill"></i>
                           </div>  {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

            </li>
          </ul>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->

       <!--start content-->
        <main class="page-content">


            @yield('content')


          </main>
       <!--end page main-->




  </div>
  <!--end wrapper-->

  <!-- Bootstrap bundle JS -->
  <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
  <script src="{{ asset('frontend') }}/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="{{ asset('frontend') }}/plugins/metismenu/js/metisMenu.min.js"></script>

  <!--app-->
  <script src="{{ asset('frontend') }}/js/app.js"></script>
  <script src="{{ asset('frontend') }}/js/index.js"></script>

  @yield('js')

</body>
</html>
