@extends('frontend.master')
@section('body')
    <main>

        <div class="hero-area section-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-area">
                            <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                                <div class="hero-caption hero-caption2">
                                    <h2>Checkout</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ url('checkout') }}">Checkout</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="checkout_area">
            <div class="container">
                <div class="returning_customer">
                    <div class="check_title">
                        <h2>
                            Returning Customer?
                            <a href="{{ url('login') }}">Click here to login</a>
                        </h2>
                    </div>
                    <p>
                        If you have shopped with us before, please enter your details in the
                        boxes below. If you are a new customer, please proceed to the
                        Billing & Shipping section.
                    </p>
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="name" name="name" value=" " />
                            <span class="placeholder" data-placeholder="Username or Email"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="password" class="form-control" id="password" name="password" value />
                            <span class="placeholder" data-placeholder="Password"></span>
                        </div>
                        <div class="col-md-12 form-group d-flex flex-wrap">
                            <a href="login.html" value="submit" class="btn"> log in</a>
                            <div class="checkout-cap ml-5">
                                <input type="checkbox" id="fruit01" name="keep-log">
                                <label for="fruit01">Create an account?</label>
                            </div>
                        </div>
                    </form>
                </div><br><br>
                {{-- <div class="cupon_area">
                    <div class="check_title">
                        <h2> Have a coupon?
                            <a href="#">Click here to enter your code</a>
                        </h2>
                    </div>
                    <input type="text" placeholder="Enter coupon code" />
                    <a class="btn" href="#">Apply Coupon</a>
                </div> --}}
                <div class="billing_details">
                    <div class="row">
                        <form class="row contact_form" action="{{ route('user.address') }}" method="post">
                            @csrf
                            <div class="col-lg-8">
                                <h3>Billing Details</h3>

                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="first"
                                        name="name"placeholder="Full Name *" />
                                    @error('name')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="company" name="state"
                                        placeholder="State *" />
                                    @error('state')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="city"
                                        name="city"placeholder="Town/City *" />
                                    @error('city')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="zip" name="pin"
                                        placeholder="Postcode/ZIP *" />
                                    @error('pin')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add1" name="address"
                                        placeholder="Address line" />
                                    @error('address')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="number" class="form-control" id="number"
                                        name="mobile"placeholder="Phone number *" />
                                    @error('mobile')
                                        <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="order_box">
                                    <h2>Your Order</h2>
                                    <ul class="list">
                                        <li>
                                            <a href="#">Product<span>Total</span>
                                            </a>
                                        </li>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($carts as $index => $cart)
                                            <li>
                                                <a href="#">{{ $product[$index]['name'] }}
                                                    <span class="middle">x {{ $cart->quantity }}</span>
                                                    ₹<span class="last"
                                                        id="payamount{{ $index }}">{{ $cart->amount }}</span>
                                                </a>
                                            </li>

                                            @php
                                                $total++;
                                            @endphp
                                        @endforeach
                                    </ul>
                                    <ul class="list list_2">
                                        <li>
                                            <a href="#">Subtotal <span id="subtotal">₹{{ $cart['amount'] }}
                                                </span></a>
                                        </li>
                                        <li>
                                            <a href="#">Shipping Charge
                                                <span>Flat rate: + ₹150 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Total<span id="total"></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <br>

                                    <div class="creat_account checkout-cap">
                                        <input type="checkbox" id="f-option8" name="selector" />
                                        <label for="f-option8">I’ve read and accept the <a href="#">terms &
                                                conditions*</a> </label>
                                    </div>
                                    {{-- <a class="btn w-100" href="#">Proceed to Paypal</a> --}}
                                    <input type="submit" class="btn w-100" value="Order Placed">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@push('js')
    <script>
        var total = '{{ $totalcart }}';
        totalcartamount();

        function totalcartamount() {
            var amount = 0;

            for (var i = 0; i < total; i++) {
                //console.log($('#payamount' + i).text());

                amount += parseInt($('#payamount' + i).text());

            }

            $('#subtotal').text(amount);
            var totals = amount + 150;
            $('#total').text("₹" + totals);
        }
    </script>
@endpush
