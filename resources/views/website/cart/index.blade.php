@extends('website.master')
@section('title')
    Shopping Cart Page
@endsection

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">

                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12 ">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-3    col-12  text-center">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 text-center">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div>
                        <div class="col-lg-1 col-md-1 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                @php
                    $sum =0;
                @endphp
                @foreach ($cart_products as $cart_product)
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="product-details.html"><img src="{{ asset($cart_product->image) }}"
                                        alt="#"></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a href="product-details.html">
                                        {{ $cart_product->name }}</a></h5>
                                <p class="product-des">
                                    <span><em>Brand:</em>{{ $cart_product->brand }}</span>
                                    <span style="color: red"><em style="color: red">Price:</em>
                                        ${{ $cart_product->price }}</span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-3 col-12">
                                <form action="{{ route('uadate-cart-product', ['id' => $cart_product->__raw_id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <button onclick="producthandlechange('{{ $cart_product->name }}',false)"
                                            class="btn btn-danger">
                                            -
                                        </button>
                                        <input class="form-control text-center" id="{{ $cart_product->name }}"
                                            value="{{ $cart_product->qty }}" name="qty" readonly min="1" required />
                                        <button onclick="producthandlechange('{{ $cart_product->name }}',true)"
                                            class="btn btn-success">
                                            +
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 text-center">
                                <p>$ <span id="{{ $cart_product->name }}ok"> {{ $cart_product->total }}</span></p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>$29.00</p>
                            </div>
                            <div class="col-lg-1 col-md-1 col-12">
                                <a class="remove-item" onclick="return confirm('Are you sure?')"
                                    href="{{ route('remove-cart-product', ['id' => $cart_product->__raw_id]) }}"><i
                                        class="lni lni-close"></i></a>
                            </div>

                        </div>
                    </div>
                    @php
                        $sum = $sum + $cart_product->total ;
                    @endphp
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>${{$sum}}</span></li>
                                        <li>Tax(15%)<span>${{$tax = round(($sum*15)/100)}}</span></li>
                                        <li>Shipping<span>$ {{$Shipping = 100}}</span></li>
                                        <li class="last">Total Payable<span>$   {{$total_payable = $sum+$tax+$Shipping}}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{ route('checkout') }}" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function producthandlechange(product, increace) {
            const productinput = document.getElementById(product);
            const productcount = parseInt(productinput.value);
            if (increace == true) {
                productinput.value = productcount + 1;
            } else if (increace == false && productcount > 1) {
                productinput.value = productcount - 1;
            }
        }
    </script>
@endsection
