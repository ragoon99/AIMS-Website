<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>

  <link rel="icon" href="{{ asset("images/Logo.png") }}" type="image/icon type">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset("vendor/aos/aos.css") }}" rel="stylesheet">
  <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
  <link href="{{ url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css") }}" rel="stylesheet">
  <link href="{{ asset("vendor/boxicons/css/boxicons.min.css") }}" rel='stylesheet'>
  {{-- <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> --}}
  <link rel="stylesheet" href="{{ url("https://unpkg.com/swiper@8/swiper-bundle.min.css") }}"/>

  <!-- Template Main CSS File -->
  <link href="{{ asset("css/style.css") }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:info.aims@gmail.com">info.aims@gmail.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+977 9828842133</span></i>
            </div>

            @if(session('user') != 'normal' && session('user') != 'admin')
                <div class="btn-group" role="group">
                    <div class="cta d-none d-md-flex align-items-center">
                        <a href="{{ route('login') }}" class="scrollto">Login</a>
                    </div>
                    {{-- <div class="cta d-none d-md-flex align-items-center">
                        <a href="{{ route('signup') }}" class="scrollto">Sign Up</a>
                    </div> --}}
                </div>
            @endif

            @if(session('user') == 'normal')
                <div class="btn-group" role="group">
                    <div class="cta d-none d-md-flex align-items-center">
                        <a href="">User Settings (WIP)</a>
                    </div>
                    <div class="cta d-none d-md-flex align-items-center">
                        <a href="accLogout" class="scrollto">Logout</a>
                    </div>
                </div>
            @endif

            @if(session('user') == 'admin')
                <div class="btn-group" role="group">
                    <div class="cta d-none d-md-flex align-items-center">
                        <a href="adminDash" class="scrollto">Go To Dashboard</a>
                    </div>
                </div>
            @endif

        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center border-bottom">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo row">
                <a href="/"><img src="{{ asset("images/Logo.png") }}" alt="AIMS Logo" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ route('home') }}">Home</a></li>
                    <li class="dropdown"><a href="#"><span>Database</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route("crop.index") }}">Crop Database</a></li>
                        <li><a href="{{ route("seed.index") }}">Seed Database</a></li>
                        <li><a href="{{ route("equipment.index") }}">Equipment Database</a></li>
                        <li><a href="{{ route("livestock.index") }}">Livestock Database</a></li>
                    </ul>
                    </li>
                    <li><a href="#">Blog (WIP)</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#about">About (WIP)</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team </a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>AIMS</h3>
                        <p>
                            Sanogaucharan <br>
                            Kathmandu, 44600<br>
                            Nepal<br><br>
                            <strong>Phone:</strong> +977 9828842133<br>
                            <strong>Email:</strong> info.aims@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Agriculture Informations</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route("crop.index") }}">Crop Data</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route("seed.index") }}">Seed Data</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route("livestock.index") }}">Livestock Data</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route("equipment.index") }}">Equipment Data</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p>Enter you email below to send you mail about latest updates.</p>
                        <form action="" method="post">
                            <input type="email" placeholder="Enter Your E-Mail" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-lg-flex py-4">

            <div class="me-lg-auto text-center text-lg-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>AIMS</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset("vendor/aos/aos.js") }}"></script>
    <script src="{{ asset("js/bootstrap.bundle.js") }}"></script>
    <script src="{{ url("https://unpkg.com/boxicons@2.1.2/dist/boxicons.js") }}"></script>
    <script src="{{ url("https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js") }}"></script>
    <script src="{{ url("https://unpkg.com/swiper@8/swiper-bundle.min.js") }}"></script>
    <script src="{{ url("https://unpkg.com/aos@2.3.1/dist/aos.js") }}"></script>

</body>

</html>
