@extends('website.master')
@section('title')
    Checkout Page
@endsection

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul class="nav nav-pills">
                            <li>
                                <a href="" class="nav-link active" data-bs-target="#cash" data-bs-toggle="pill">Cash
                                    On Delivery</a>
                            </li>
                            <li>
                                <a href="" class="nav-link " data-bs-target="#online"
                                    data-bs-toggle="pill">Online</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="cash">
                                <div class="row">
                                    <form action="{{ route('new-cash-order') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Full Name:</label>
                                                <div class="row">
                                                    <div class="col-md-12 form-input form">
                                                        @if (isset($customer->id))
                                                            <input type="text" name="name"
                                                                value="{{ $customer->name }}" placeholder="Full Name"
                                                                readonly />
                                                        @else
                                                            <input type="text" name="name" value="{{ old('name') }}"
                                                                placeholder="Full Name" />
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        @if (isset($customer->id))
                                                            <input type="email" name="email"
                                                                value="{{ $customer->email }}" placeholder="Email Address"
                                                                readonly>
                                                        @else
                                                            <input type="email" name="email"
                                                                class="form-input form @error('email') is-invalid @enderror"
                                                                value="{{ old('email') }}" placeholder="Email Address">
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        @if (isset($customer->id))
                                                            <input type="text" required value="{{ $customer->mobile }}"
                                                                name="mobile" placeholder="Phone Number" readonly>
                                                        @else
                                                            <input
                                                                class="form-control @error('mobile') is-invalid @enderror"
                                                                type="text" name="mobile" value="{{ old('mobile') }}"
                                                                placeholder="Phone Number">
                                                            @error('mobile')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Delivery Address</label>
                                                <div class="form-input form">
                                                    <textarea name="delivery" class="form-control @error('delivery') is-invalid @enderror"
                                                        placeholder="Order delivery Address" style="height: 100px">{{ old('delivery') }}</textarea>
                                                    @error('delivery')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div class="col-md-12">
                                        @if (isset($customer->id))
                                        @else
                                            <div class="single-form">
                                                <input class="ok @error('password') is-invalid @enderror" required
                                                    name="password" type="password" placeholder="Creat New Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Payment Type:</label>
                                                <div>
                                                    <label><input type="radio" name="payment_type" checked value="1">
                                                        Cash On Delivery</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="checkbox-3" checked>
                                                <label for="checkbox-3"><span></span></label>
                                                <p>I accpet all terms and conditions.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button class="btn" type="submit">Comfirm Order</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade show px-3" id="online">
                                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="firstName">Full name</label>
                                            {{-- <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="customer_name" placeholder="Enter Your Name" value="" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                            @if (isset($customer->id))
                                                <input type="text" name="name" class="form-control"
                                                    id="customer_name" value="{{ $customer->name }}">
                                            @else
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="customer_name" placeholder="Enter Your Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="mobile">Mobile</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+88</span>
                                            </div>
                                            {{-- <input type="text" name="mobile"
                                                class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                                                placeholder="Mobile" value="01">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                            @if (isset($customer->id))
                                                <input type="text" name="mobile" class="form-control"
                                                    id="customer_name" value="{{ $customer->mobile }}">
                                            @else
                                                <input type="text" name="mobile"
                                                    class="form-control @error('mobile') is-invalid @enderror"
                                                    id="customer_name" value="01">
                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email">Email <span class="text-muted"></label>
                                        {{-- <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="Email" value="">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                        @if (isset($customer->id))
                                            <input type="text" name="email" class="form-control" id="customer_name"
                                                value="{{ $customer->email }}">
                                        @else
                                            <input type="text" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="customer_name" placeholder="Enter Your Email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="address"> Delivery Address</label>
                                        <input type="text" class="form-control @error('delivery') is-invalid @enderror"
                                            name="delivery" id="address" placeholder=" order delivery address"
                                            value="">
                                        @error('delivery')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="country">Country</label>
                                            <select class="custom-select d-block form-control w-100" id="country"
                                                required>
                                                <option value="">Choose...</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid country.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="state">State</label>
                                            <select class="custom-select d-block form-control w-100  " name="state"
                                                id="state" required>
                                                <option value="">Choose...</option>
                                                <option value="Dhaka">Dhaka</option>
                                            </select>

                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control " name="zip" id="zip"
                                                placeholder="" required>

                                        </div>
                                    </div>
                                    @if (isset($customer->id))
                                    @else
                                        <div class="single-form">
                                            <input class="ok @error('password') is-invalid @enderror" required
                                                name="password" type="password" placeholder="Creat New Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Payment Type:</label>
                                            <div>
                                                <label><input type="radio" name="payment_type" checked value="2">
                                                    Online</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-3" checked>
                                            <label for="checkbox-3"><span></span></label>
                                            <p>I accpet all terms and conditions.</p>
                                        </div>
                                    </div>
                                    <div class="single-checkbox">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to
                                            checkout</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">Pricing Table</h5>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Total Price:</p>
                                    @php
                                        $sum = 0;
                                    @endphp
                                    @foreach (ShoppingCart::all() as $item)
                                        @php
                                            $sum = $sum + $item->total;
                                        @endphp
                                    @endforeach
                                    <p class="price">${{ $sum }}</p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Tax(15%):</p>
                                    <p class="price">${{ $tax = round(($sum * 15) / 100) }}</p>
                                </div>
                                <div class="total-price discount">
                                    <p class="value">Shiping:</p>
                                    <p class="price">${{ $Shipping = 100 }}</p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total Price:</p>
                                    <p class="price">$ {{ $total = $sum + $tax + $Shipping }}</p>
                                </div>
                                @php
                                    Session::put('order_total', $total);
                                    Session::put('tax_total', $tax);
                                    Session::put('shipping_total', $Shipping);
                                @endphp
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{ asset('website') }}/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
