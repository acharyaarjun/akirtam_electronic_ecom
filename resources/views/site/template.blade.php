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

    {{-- top-header section starts here --}}
    <section id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-xl-8 col-sm-12 col-12 text-sm-center">
                    <div class="top-header-contact">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                <i class="fa-solid fa-location-dot icon"></i> Pokhara - 8, Sirjana Chowk
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                <i class="fa-solid fa-phone icon"></i> +977 061-538358
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-12 text-end header-text-sm-hide">
                    <div class="top-header-social-icon">
                        <a href="">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- top-header section ends here --}}

    {{-- navbar section starts here --}}
    <section id="top-header-navbar">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Our Services</a>
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
                            <a class="nav-link" aria-current="page" href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    {{-- navbar section ends here --}}

    {{-- slider section starts here --}}
    <section id="slider">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="slider-center">
                                    <div class="slider-content">
                                        <h1>
                                            Choose Your latest <br> <span>Electronic</span> Products
                                        </h1>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa saepe
                                            laudantium
                                            voluptate facilis quis debitis!
                                        </p>

                                        <div class="button">
                                            <a href="" class="btn">Explore Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 sm-hide">
                                <div class="slider-content">
                                    <div class="slider-center">
                                        <div class="slider-image">
                                            <img src="{{ asset('site/image/slider1.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="slider-center">
                                    <div class="slider-content">
                                        <h1>
                                            Choose Your latest <br> <span>Electronic</span> Products
                                        </h1>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa saepe
                                            laudantium
                                            voluptate facilis quis debitis!
                                        </p>

                                        <div class="button">
                                            <a href="" class="btn">Explore Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 sm-hide">
                                <div class="slider-content">
                                    <div class="slider-center">
                                        <div class="slider-image">
                                            <img src="{{ asset('site/image/slider1.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="slider-center">
                                    <div class="slider-content">
                                        <h1>
                                            Choose Your latest <br> <span>Electronic</span> Products
                                        </h1>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa saepe
                                            laudantium
                                            voluptate facilis quis debitis!
                                        </p>

                                        <div class="button">
                                            <a href="" class="btn">Explore Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 sm-hide">
                                <div class="slider-content">
                                    <div class="slider-center">
                                        <div class="slider-image">
                                            <img src="{{ asset('site/image/slider1.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- slider section ends here --}}



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
