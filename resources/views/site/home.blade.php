@extends('site.template', ['activePage' => 'homepage'])
{{-- [
    'array_item' => 'array_item_value',
]; --}}
{{-- home page ko content dekhida site.template ma $activePage use garna pauchu tesko value chai
$activePage = 'homepage' --}}
@section('content')
    {{-- slider section starts here --}}
    <section id="slider">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="100">
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
                                            <img src="{{ asset('site/image/about.png') }}" alt="" class="img-fluid">
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

    {{-- about section starts here --}}
    <section id="about" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h6>About Us</h6>
                        <h2>Learn More <span>about us</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="about-image">
                        <img src="{{ asset('site/image/about.png') }}" alt="ABOUT IMAGE"
                            title="AKIRTAM ELECTRONIC ECOMMERCE WEBSITE" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque deserunt porro veniam aperiam
                            iure iste sed, ipsa vero architecto nam, harum, laudantium doloribus sunt. Soluta,
                            architecto doloribus. Ipsum, eos omnis.
                            architecto doloribus. Ipsum, eos omnis.

                        </p>

                        <p style="text-align: center">
                            <a class="btn mt-2">Read More</a>
                        </p>
                    </div>

                    <div class="about-video">
                        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/zBjJUV-lzHo"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen style="width: 100%;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- about section ends here --}}

    {{-- our category section starts here --}}
    <section id="category" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h6>Our Category</h6>
                        <h2>Shop by <span>Category</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($categories as $category)
                    <div class="col-md-2">
                        <a href="">
                            <div class="category-box">
                                <div class="image">
                                    <img src="{{ asset('uploads/category/' . $category->category_image) }}"
                                        alt="{{ $category->slug }}" title="{{ $category->category_title }}"
                                        class="img-fluid img-rounded" />
                                </div>
                                <div class="name">
                                    <h5>{{ $category->category_title }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- our category section ends here --}}

    {{-- service section starts here --}}
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="service-box">
                        <i class="fa-solid fa-truck-fast icon"></i>
                        <h2>Free Shipping</h2>
                        <p>Order over $100</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-box">
                        <i class="fa-solid fa-shield icon"></i>
                        <h2>Secure Payment</h2>
                        <p>100% Secure Payment</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-box">
                        <i class="fa-solid fa-award icon"></i>
                        <h2>Best Price</h2>
                        <p>Guaranted Low Cost</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="service-box">
                        <i class="fa-solid fa-right-left icon"></i>
                        <h2>Easy Return</h2>
                        <p>Within 30 Days Returns</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- service section ends here --}}

    {{-- prdoducts section starts here --}}
    <section id="product" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h6>Top Sale</h6>
                        <h2>Our Popular <span>Products</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @for ($i = 0; $i < 8; $i++)
                    <div class="col-md-3">
                        <div class="product-box">
                            <div class="product-image">
                                <img src="{{ asset('site/image/headphone.png') }}" alt="Headphone" title="Headphone"
                                    class="img-fluid" />

                                <div class="product-icon">
                                    <a href="#">
                                        <i class="fa-regular fa-heart icon"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa-solid fa-cart-shopping icon"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-title">
                                <a href="#">Headphone</a>
                                <span>
                                    <i class="fa-solid fa-star star"></i> 4.8(87)
                                </span>
                            </div>
                            <div class="product-category">
                                <h5>Earphone | <span class="text-success">Available in Stock</span></h5>
                            </div>
                            <div class="product-price">
                                <p>Rs 1000 <del>Rs 1200</del></p>
                            </div>
                            <div class="button">
                                <a href="#" class="btn">View Details</a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
    {{-- prdoducts section end here --}}
@endsection


@section('abc')
    hari bajhadur
@endsection
