{{-- @extends('layouts.admin', ['activePage' => 'manageorders']) --}}
{{--
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="category" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>
                                            Customer Details
                                        </th>
                                        <th>Total</th>
                                        <th>Shipping Address</th>
                                        <th>Full Address</th>
                                        <th>Payment Status</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $order->cart_code }}
                                            </td>
                                            <td>{{ $order->created_at->format('M d, Y H:m:s') }}</td>
                                            <td>
                                                {{ $order->name }} <br>
                                                {{ $order->email }} <br>
                                                {{ $order->mobile_number }}
                                            </td>
                                            <td>Rs. {{ $order->payment_amount }}</td>
                                            <td>{{ $order->shipping_address }}</td>
                                            <td>{{ $order->full_address }}</td>
                                            <td>
                                                @if ($order->payment_status == 'Y')
                                                    <span class="text-success ">Completed</span>
                                                @else
                                                    <span class="text-danger ">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->payment_method == 'online')
                                                    <span class="">Online</span>
                                                @else
                                                    <span class="">Cash On Delivery!</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#view-{{ $order->cart_code }}"
                                                    style="font-weight: bold; cursor: pointer; color: blue;">View</a>

                                                @if ($order->payment_method == 'cod')
                                                    |
                                                    <a href="{{ route('admin.makePaymentComplete', $order->id) }}"
                                                        onclick="return confirm('Are you sure you want to change payment status?');">Make
                                                        Paymnt
                                                        Complete</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($orders as $order1)
        <?php
        $user = Auth::user();
        
        $carts = App\Models\Cart::where('cart_code', $order1->cart_code)->get();
        if ($carts) {
            $total_amount = App\Models\Cart::where('cart_code', $order1->cart_code)->sum('total_cost');
        }
        ?>
        <!-- Modal for Viewing Shipping Area-->
        <div class="modal fade templateModal" id="view-{{ $order1->cart_code }}" tabindex="-1" role="dialog"
            aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View Items - {{ $order1->cart_code }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <table class="table">
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('site/uploads/books/' . $cart->product->book_image) }}"
                                                    alt="{{ $cart->product->book_name }}" class="img-fluid"
                                                    style="height: 100px;">
                                            </td>
                                            <td>
                                                <p>{{ $cart->product->book_name }} <br>
                                                    {{ $cart->product->book_author }} <br>
                                                    {{ $cart->quantity }} * Rs. {{ $cart->cost }}
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row top-bottom-border p-2">
                                <div class="col-md-6">Sub Total:</div>
                                <div class="col-md-6 text-right cost">Rs {{ $total_amount }}</div>
                            </div>
                            <div class="row top-bottom-border p-2">
                                <div class="col-md-6">Shipping Charge:</div>
                                <div class="col-md-6 text-right cost">Rs {{ $order1->payment_amount - $total_amount }} |
                                    {{ $order1->shipping_address }}
                                </div>
                            </div>
                            <div class="row top-bottom-border p-2">
                                <div class="col-md-6">Grand Total:</div>
                                <div class="col-md-6 text-right cost">Rs.
                                    {{ $order1->payment_amount }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection --}}

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="com-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Manage Orders</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="border">
                                <table id="category" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>
                                                Customer Details
                                            </th>
                                            <th>Total</th>
                                            <th>Shipping Address</th>
                                            <th>Full Address</th>
                                            <th>Payment Status</th>
                                            <th>Payment Method</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $order->cart_code }}
                                                </td>
                                                <td>{{ $order->created_at->format('M d, Y H:m:s') }}</td>
                                                <td>
                                                    {{ $order->name }} <br>
                                                    {{ $order->email }} <br>
                                                    {{ $order->mobile_number }}
                                                </td>
                                                <td>Rs. {{ $order->payment_amount }}</td>
                                                <td>All Over Nepal - 100</td>
                                                <td>{{ $order->address }}</td>
                                                <td>
                                                    @if ($order->payment_status == 'Y')
                                                        <span class="text-success ">Completed</span>
                                                    @else
                                                        <span class="text-danger ">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($order->payment_method == 'online')
                                                        <span class="">Online</span>
                                                    @else
                                                        <span class="">Cash On Delivery!</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#viewOrder-{{ $order->cart_code }}"
                                                        style="font-weight: bold; cursor: pointer; color: blue;">View</a>

                                                    @if ($order->payment_method == 'cod')
                                                        |
                                                        <a href="{{ route('admin.makePaymentComplete', $order->id) }}"
                                                            onclick="return confirm('Are you sure you want to change payment status?');">Toggle
                                                            Payment</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    @foreach ($orders as $order1)
        <?php
        $carts = App\Models\Cart::where('cart_code', $order1->cart_code)->get();
        ?>
        <div class="modal fade" id="viewOrder-{{ $order1->cart_code }}" tabindex="-1" aria-labelledby="viewOrderLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="viewOrderLabel"><b>View Order
                                #{{ $order1->cart_code }}</b></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('uploads/product/' . $cart->getProductFromCart->product_image) }}"
                                                alt="" class="img-fluid" style="height: 100px;">
                                        </td>
                                        <td>
                                            <p>{{ $cart->getProductFromCart->product_title }} <br>
                                                {{ $cart->getProductFromCart->category->category_title }} <br>
                                                {{ $cart->quantity }} * Rs. {{ $cart->price }}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row top-bottom-border p-2">
                            <div class="col-md-6">Sub Total:</div>
                            <div class="col-md-6 text-right cost">Rs {{ $carts->sum('total_price') }}</div>
                        </div>
                        <div class="row top-bottom-border p-2">
                            <div class="col-md-6">Shipping Charge:</div>
                            <div class="col-md-6 text-right cost">Rs 100 | All over Nepal.
                            </div>
                        </div>
                        <div class="row top-bottom-border p-2">
                            <div class="col-md-6">Grand Total:</div>
                            <div class="col-md-6 text-right cost">Rs.
                                {{ $carts->sum('total_price') + 100 }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
