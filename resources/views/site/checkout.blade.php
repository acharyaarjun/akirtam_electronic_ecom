@extends('site.template', ['activePage' => 'checkout'])

@section('content')
    {{-- bread crumbs starts here --}}
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>Enjoy Your Trekking</h2>
                    <ol>
                        <li><a href="{{ route('getHome') }}">Home</a></li>
                        <li>Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    {{-- bread crumbs ends here --}}


    {{-- checkout section starts here --}}
    <section id="checkout">
        <div class="container">
            <form action="{{ route('postCheckout') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h2>Billing Details</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Name*</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name" placeholder="" value="{{ old('name') }}"
                                                required>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile_number">Mobile Number*</label>
                                            <input type="text"
                                                class="form-control @error('mobile_number') is-invalid @enderror"
                                                name="mobile_number" id="mobile_number" placeholder=""
                                                value="{{ old('mobile_number') }}" required>

                                            @error('mobile_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email*</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" placeholder="" value="{{ old('email') }}"
                                                required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="full_address">Full Address*</label>
                                            <input type="text"
                                                class="form-control @error('full_address') is-invalid @enderror"
                                                name="address" id="full_address" placeholder=""
                                                value="{{ old('full_address') }}" required>

                                            @error('full_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="additional_information">Additon Informations*</label>
                                            <textarea class="form-control @error('additional_information') is-invalid @enderror" name="additional_information"
                                                id="additional_information" placeholder="Additional Information about yourself. " rows="11">{{ old('additional_information') }}</textarea>

                                            @error('additional_information')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row model-footer">
                                    <div class="col-md-12 text-center mt-5">
                                        <input type="submit" class="btn w-100 btn-normal" value="Place Order">
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h2>Your Orders</h2>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('uploads/product/' . $cart->getProductFromCart->product_image) }}"
                                                        alt="{{ $cart->getProductFromCart->product_title }}"
                                                        class="img-fluid">
                                                </td>
                                                <td>
                                                    <p>{{ $cart->getProductFromCart->product_title }} <br>
                                                        {{ $cart->getProductFromCart->category->category_title }}
                                                        Trekking Region<br>
                                                        {{ $cart->quantity }} * Rs. {{ $cart->cost }}
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row top-bottom-border">
                                    <div class="col-md-6">Sub Total:</div>
                                    <div class="col-md-6 text-right cost">Rs {{ $carts->sum('total_price') }}</div>
                                </div>
                                <div class="row top-bottom-border">
                                    <div class="col-md-6">Shipping Charge:</div>
                                    <div class="col-md-6 text-right cost">Rs 100 (all over Nepal)</div>
                                </div>
                                <div class="row top-bottom-border">
                                    <div class="col-md-6">Grand Total:</div>
                                    <div class="col-md-6 text-right cost">Rs.
                                        {{ $carts->sum('total_price') + 100 }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-check">
                                    {{-- <label class="form-check-label mb-2">
                                        <input type="radio" class="form-check-input" name="payment_method" id=""
                                            value="online" required>
                                        <img src="{{ asset('site/image/esewa.png') }}" alt="" class="img-fluid">
                                    </label> <br> --}}
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="payment_method" id=""
                                            value="cod" required>

                                        <img src="{{ asset('site/image/cod.png') }}" alt="" class="img-fluid">
                                    </label>

                                    @error('payment_method')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row model-footer">
                                    <div class="col-md-12 text-center mt-5">
                                        <input type="submit" class="btn w-100 btn-normal" value="Place Order">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    {{-- checkout section ends here --}}
@endsection
