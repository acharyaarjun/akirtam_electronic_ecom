@extends('site.template', ['activePage' => 'cart'])

@section('content')
    {{-- bread crumbs starts here --}}
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>Your Shoping Cart</h2>
                    <ol>
                        <li><a href="{{ route('getHome') }}">Home</a></li>
                        <li>Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    {{-- bread crumbs ends here --}}

    <section id="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive card p-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Book</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('uploads/product/' . $cart->getProductFromCart->product_image) }}"
                                                alt="" class="img-fluid">
                                        </td>
                                        <td>{{ $cart->getProductFromCart->product_title }}</td>
                                        <td>Rs. {{ $cart->total_price }}</td>
                                        <td>
                                            <form action="{{ route('getUpdateCart', $cart->id) }}" method="POST"
                                                class="form-inline">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="quantity"
                                                        id="quantiy" value="{{ $cart->quantity }}" max="30"
                                                        min="1">
                                                </div>
                                                <button type="submit" class="btn btn-danger form-control"><i
                                                        class="fa-solid fa-pen-to-square"></i></button>
                                            </form>
                                        </td>
                                        <td>Rs. {{ $cart->total_price }}</td>
                                        <td>
                                            <a href="{{ route('getDeleteCart', $cart->id) }}" class="btn btn-primary"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>Shipping Details</h2>
                        </div>
                        <div class="card-body">
                            <p>
                                The shipment or order details, on the contrary, is a summary of all the information
                                regarding a parcel that a shipper wants to send to a receiver. It contains information about
                                the pick-up and delivery address and contact person. <br>
                                Click here to see the <a href="" data-toggle="modal"
                                    data-target="#changeShippingDetail">Shipping Charge</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h2>Card Totals</h2>
                        </div>
                        <div class="card-body">
                            <table class="table text-left">
                                <thead class="tallo" style="font-weight: bold">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>Rs {{ $carts->sum('total_price') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charge</td>
                                        <td>Rs 100 (all over nepal)</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>Rs. {{ $carts->sum('total_price') + 100 }}
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-3">
                    <a href="{{ route('getHome') }}" class="btn btn-normal">Continue Shopping</a>
                </div>
                <div class="col-md-6 text-right mt-3">
                    <a href="{{ route('getCheckout') }}" class="btn btn-normal">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </section>
@endsection
