@extends('site.template', ['activePage' => 'productwithcategory'])

@section('content')
    {{-- bread crumbs starts here --}}
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>{{ $category->category_title }}</h2>
                    <ol>
                        <li><a href="{{ route('getHome') }}">Home</a></li>
                        <li>{{ $category->category_title }}</li>
                        <li>Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    {{-- bread crumbs ends here --}}

    {{-- recomendation section starts here --}}
    <section id="product" class="section">
        <div class="container">
            {{-- <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h6>Category</h6>
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div> --}}
            <div class="row justify-content-center">
                @foreach ($category->activeProducts as $item)
                    <div class="col-md-3">
                        <div class="product-box">
                            <div class="product-image">
                                <img src="{{ asset('uploads/product/' . $item->product_image) }}"
                                    alt="{{ $item->product_title }}" title="{{ $item->product_title }}" class="img-fluid" />

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
                                <a href="#">{{ $item->product_title }}</a>
                                <span>
                                    <i class="fa-solid fa-star star"></i> 4.8(87)
                                </span>
                            </div>
                            <div class="product-category">
                                <h5>{{ $item->category->category_title }} |
                                    @if ($item->product_stock > 0)
                                        <span class="text-success">Available in
                                            Stock</span>
                                    @else
                                        <span class="text-danger">Not Available in Stock</span>
                                    @endif
                                </h5>
                            </div>
                            <div class="product-price">
                                <p>$ {{ $item->orginal_cost - $item->discounted_cost }}
                                    @if ($item->discounted_cost > 0)
                                        <del>$
                                            {{ $item->orginal_cost }}</del>
                                    @endif
                                </p>
                            </div>
                            <div class="button">
                                <a href="{{ route('getProductDetails', $item->slug) }}" class="btn">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- recomendation section ends here --}}
@endsection
