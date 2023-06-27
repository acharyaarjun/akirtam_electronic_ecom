@extends('site.template', ['activePage' => 'productwithcategory'])

@section('content')
    {{-- bread crumbs starts here --}}
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>{{ $product->product_title }}</h2>
                    <ol>
                        <li><a href="{{ route('getHome') }}">Home</a></li>
                        <li>{{ $product->category->category_title }}</li>
                        <li>{{ $product->product_title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    {{-- bread crumbs ends here --}}

    {{-- product details section starts here --}}
    <section id="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="img img-link">
                                <a href="{{ asset('uploads/product/' . $product->product_image) }}" target="_blank">
                                    <img src="{{ asset('uploads/product/' . $product->product_image) }}"
                                        alt="{{ $product->product_title }}" title="{{ $product->product_title }}"
                                        class="img-fluid w-100">
                                </a>
                            </div>
                        </div>
                        {{-- <div class="col-md-3 mb-2">
                            <a href="{{ asset('site/image/book1.png') }}">
                                <img src="{{ asset('site/image/book1.png') }}" alt="" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ asset('site/image/book2.png') }}">
                                <img src="{{ asset('site/image/book2.png') }}" alt="" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ asset('site/image/book3.png') }}">
                                <img src="{{ asset('site/image/book3.png') }}" alt="" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ asset('site/image/book4.png') }}">
                                <img src="{{ asset('site/image/book4.png') }}" alt="" class="img-fluid w-100">
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="book_name">{{ $product->product_title }}</h2>
                    <div class="rating">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-regular fa-star text-warning"></i>
                    </div>
                    <a href="" data-toggle="modal" data-target="#addreviewModal">Add Reviews.</a>
                    <h6 class="cost">
                        Cost: @if ($product->discounted_cost)
                            <del>Rs. {{ $product->orginal_cost }}</del>
                        @endif
                        <span>
                            Rs. {{ $product->orginal_cost - $product->discounted_cost }}
                        </span>
                    </h6>
                    <div class="description">
                        <h6>Description</h6>
                        <p>
                            {!! $product->product_description !!}
                        </p>
                        <p>
                            <b>Category:</b> {{ $product->category->category_title }} <br>
                            <b>Stock Availability:</b>: {{ $product->product_stock }} <br>
                        </p>
                    </div>
                    <form action="{{ route('postAddToCart', $product->slug) }}" method="POST" class="form">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" min="1" max="5" class="form-control w-100"
                                        id="rating"name="quantity" name="quantity" required>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-cart form-control">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- product details section end here --}}

    {{-- recomendation starts here --}}
    <?php $related_products = App\Models\Product::where('category_id', $product->category_id)
        ->where('deleted_at', null)
        ->where('status', 'active')
        ->where('id', '!=', $product->id)
        ->limit(4)
        ->get(); ?>
    <section id="product" class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h6>Category</h6>
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($related_products as $item)
                    <div class="col-md-3">
                        <div class="product-box">
                            <div class="product-image">
                                <img src="{{ asset('uploads/product/' . $item->product_image) }}"
                                    alt="{{ $item->product_title }}" title="{{ $item->product_title }}"
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
