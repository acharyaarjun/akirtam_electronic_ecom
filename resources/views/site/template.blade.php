<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AKIRTAM | ELECTRONIC | ECOM</title>

    {{-- fontawesome ko css link gareko --}}
    <link rel="stylesheet" href="{{ asset('site/fontawesome/all.css') }}">

    {{-- bootstrap ko css link gareko --}}
    <link rel="stylesheet" href="{{ asset('site/bootstrap/bootstrap.css') }}">

    {{-- style.css link gareko --}}
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">

</head>

<body>
    {{-- top header lai jabarjasti include gareko --}}
    @include('site.top-header')

    {{-- navbar section starts here --}}
    <section id="top-header-navbar">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('getHome') }}">
                    <img src="{{ asset('site/image/logo.png') }}" alt="LOGO" title="AKIRTAM ELECTRONIC ECOM"
                        class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link {{ $activePage == 'homepage' ? 'active' : '' }}" aria-current="page"
                                href="{{ route('getHome') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $activePage == 'aboutpage' ? 'active' : '' }}"
                                href="{{ route('getAbout') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $activePage == 'servicepage' ? 'active' : '' }}"
                                href="{{ route('getService') }}">Our Services</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Lorem, ipsum dolor.Laptop</a></li>
                                <li><a class="dropdown-item" href="#">Mobile</a></li>
                                <li><a class="dropdown-item" href="#">Watch</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $activePage == 'contactpage' ? 'active' : '' }}" aria-current="page"
                                href="{{ route('getContact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    {{-- navbar section ends here --}}

    {{-- sectionname chai yesko child page ma @section('abc') .... @endsection --}}
    {{-- @yield('abc') --}}

    {{-- sectionname chai yesko child page ma @section('content') .... @endsection --}}
    @yield('content')


    {{-- footer section starts here --}}
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
                    <h2>About Info</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia repellat laboriosam distinctio
                        dolorum tempore.
                    </p>
                    <p>
                        <i class="fa-solid fa-location-dot fot-icon"></i> Address: Baglung
                    </p>
                    <p>
                        <i class="fa-solid fa-envelope fot-icon"></i> Email: apridcodes@gmail.com
                    </p>
                    <p>
                        <i class="fa-solid fa-phone fot-icon"></i> Phone: 061-234234
                    </p>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-4 col-xs-6">
                    <h2>Information</h2>
                    <ul>
                        <li>
                            <a href="">Sign In</a>
                        </li>
                        <li>
                            <a href="">View Cart</a>
                        </li>
                        <li>
                            <a href="">My Wishlist</a>
                        </li>
                        <li>
                            <a href="">My Orders</a>
                        </li>
                        <li>
                            <a href="#">Help</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-4 col-xs-6">
                    <h2>Info Links</h2>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Shop</a>
                        </li>
                        <li>
                            <a href="#">Blog</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-4 col-xs-6">
                    <h2>Supported Area</h2>
                    <ul>
                        <li>
                            <a href="#">Hello & Contact</a>
                        </li>
                        <li>
                            <a href="#">Shipping & Tax</a>
                        </li>
                        <li>
                            <a href="#">Retrun Policy</a>
                        </li>
                        <li>
                            <a href="#">Affliates</a>
                        </li>
                        <li>
                            <a href="#">Legal Notices</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="bottom-footer">
        <div>Copyright &copy; Akirtam | Developed with <b>Akirtam</b> by Akirtam.</div>
    </section>
    {{-- footer section ends here --}}

    {{-- jquery link gareko --}}
    <script src="{{ asset('site/jquery/jquery.js') }}"></script>

    {{-- propoer js ko javascript link gareko --}}
    <script src="{{ asset('site/bootstrap/proper.js') }}"></script>

    {{-- bootstrap ko javascript lai link gareko --}}
    <script src="{{ asset('site/bootstrap/bootstrap.js') }}"></script>


    {{-- fontawesome ko js link gareko --}}
    <script src="{{ asset('site/fontawesome/all.js') }}"></script>

    {{-- script.js link gareko --}}
    <script src="{{ asset('site/js/script.js') }}"></script>
</body>

</html>
