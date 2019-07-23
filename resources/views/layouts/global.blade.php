<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Knowledge Management</title>
  <link rel="icon" href="{{ asset('assets/images/esgul.png') }}" type="image/png">
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets1/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets1/modules/fontawesome/css/all.min.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('assets1/modules/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets1/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"> --}}

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets1/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets1/modules/weather-icon/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets1/modules/weather-icon/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets11/modules/summernote/summernote-bs4.csss') }}">
  @yield('css')

  <!-- Template CSS -->
  {{-- <link rel="stylesheet" href="{{ asset('assets1/css/style.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('assets1/css/components.css') }}">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

  <!-- <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css"> -->
  <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/Magnific-Popup/magnific-popup.css') }}">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/weather-icon/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">

  <!-- Template CSS -->
  <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

  <!-- Start GA -->
</head>
<body>
  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620" style="margin-left: 40px;">
          <a class="navbar-brand logo_h" href="{{ route('home') }}"><img style="width: 200px; margin: 5px 0; padding: 5px 0;" src="{{ asset('assets/images/LOGO-UEU.png') }}" alt="esgul"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
                <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li> 
                @if (\Auth::user())
                  <li class="nav-item"><a class="nav-link" href="{{ route('knowledge') }}">Knowledge</a></li>
                @else
                  <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Knowledge</a></li>  
                @endif
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#">Logout</a></li> --}}
                @if (Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  <!--================ Hero Banner start =================-->      
  <section class="hero-banner">
    @if (\Request::route()->getName() != 'home' && \Request::route()->getName() != NULL)
        @yield('content')
    @else
         <div class="hero-banner__content text-center">
            <h1>Knowledge Management System</h1>
            <h2>Department Humas Universitas Esa Unggul</h2>
        </div>
    @endif
  </section>

  @yield('modal')

  <!-- General JS Scripts -->
  <script src="{{ asset('assets1/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets1/modules/popper.js') }}"></script>
  <script src="{{ asset('assets1/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets1/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets1/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets1/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets1/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('assets1/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('assets1/modules/chart.min.js') }}"></script>
  <script src="{{ asset('assets1/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('assets1/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('assets1/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('assets1/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
  <script src="{{ asset('assets1/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets1/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets1/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  @yield('js')

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets1/js/page/index-0.js') }}"></script>
  
  <!-- Template JS File -->
  @yield('footer-scripts')
  <script src="{{ asset('assets1/js/scripts.js') }}"></script>
  <script src="{{ asset('assets1/js/custom.js') }}"></script>
  <!--================ Hero Banner end =================-->

  <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
  <!-- <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script> -->
  <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendors/Magnific-Popup/jquery.magnific-popup.min.js') }}"></script>
  <!-- <script src="assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script> -->

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <!-- <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script> -->
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
  <script src="{{ asset('assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <!-- <script src="assets/modules/summernote/summernote-bs4.js"></script> -->
  <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <!-- <script src="assets/js/page/index-0.js"></script> -->
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <!-- <script src="assets/js/jquery.js"></script> -->
  <script>
  $(document).ready(function(){
    $("#myTable").DataTable();
  });
  $(document).ready(function(){
    $("#knowledge").change(function(){
        var lid = $("#knowledge").val();
        $.ajax({
            url: 'child.php',
            method: 'POST',
            data: 'lid=' +lid
        }).done(function(child){
            // console.log(child);
            $('#child').html(child);
        });
    });
  });
  </script>
</body>
</html>