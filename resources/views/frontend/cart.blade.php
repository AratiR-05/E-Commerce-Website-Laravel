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
                                    <h2>Cart</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{ url('cart') }}">Cart</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="cart_area">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th></th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($carts as $index => $cart)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('storage/app') }}/{{ $pro[$index]['imgpath'] }}" alt>
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $pro[$index]['name'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>₹ <span id="price{{ $index }}">{{ $pro[$index]['price'] }}</span>
                                            </h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <span class="input-number-decrement"
                                                    onclick="dec({{ $index }},'{{ $pro[$index]['proid'] }}',{{ $cart['id'] }})">
                                                    <i class="ti-minus"></i></span>
                                                <input class="input-number" type="text" name="quantity"
                                                    id="cartval{{ $index }}" value="{{ $cart['quantity'] }}">
                                                <span class="input-number-increment"
                                                    onclick="inc({{ $index }},'{{ $pro[$index]['proid'] }}',{{ $cart['id'] }})">
                                                    <i class="ti-plus"></i></span>
                                            </div>

                                        </td>
                                        <td>
                                            <h4 id="total{{ $index }}">
                                                ₹ <span
                                                    id="payamount{{ $index }}">{{ $pro[$index]['price'] * $cart['quantity'] }}</span>
                                            </h4>

                                        </td>
                                        <td></td>
                                        <td>
                                            <a href="" title="Delete" onclick="del('{{ $cart['id'] }}')">
                                                <img src="{{ asset('public\frontend\assets\img\icon\th.jpg') }}"
                                                    height="10px" width="15px">
                                            </a>
                                        </td>
                                    </tr>

                                    @php
                                        $total++;
                                    @endphp
                                @endforeach

                                <tr class="bottom_button">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="cupon_text float-right">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5 id="subtotal">{{ $cart['amount'] }} </h5>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Shipping</h5>
                                    </td>
                                    <td>
                                        <div class="shipping_box">
                                            <ul class="list">
                                                <li>
                                                    Flat Rate: $5.00
                                                    <input type="radio"
                                                        aria-label="Radio button for following text input">
                                                </li>
                                                <li>
                                                    Free Shipping
                                                    <input type="radio"
                                                        aria-label="Radio button for following text input">
                                                </li>
                                                <li>
                                                    Flat Rate: $10.00
                                                    <input type="radio"
                                                        aria-label="Radio button for following text input">
                                                </li>
                                                <li class="active">
                                                    Local Delivery: $2.00
                                                    <input type="radio"
                                                        aria-label="Radio button for following text input">
                                                </li>
                                            </ul>
                                            <h6>
                                                Calculate Shipping
                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </h6>
                                            <select class="shipping_select">
                                                <option value="2">India</option>
                                                <option value="1">Bangladesh</option>
                                                <option value="4">united kingdom</option>
                                                <option value="4">Pakistan</option>
                                                <option value="4">Nepal</option>
                                                <option value="4">China</option>
                                                <option value="4">Japan</option>
                                            </select>
                                            <select class="shipping_select section_bg">
                                                <option value="1">Bihar</option>
                                                <option value="2">Jharkhand</option>
                                                <option value="4">Uttar Pradesh</option>
                                                <option value="4">Andhra Pradesh</option>
                                                <option value="4">Rajsthan</option>
                                                <option value="4">Gujrat</option>
                                            </select>
                                            <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                                            <a class="btn" href="#">Update Details</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right">
                            <a class="btn" href="{{ url('/home') }}">Continue Shopping</a>
                            <a class="btn checkout_btn" href="{{ url('checkout') }}">Proceed to checkout</a>
                        </div>
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

        function dec(id, proid, cartid) {
            var cartvalue = $('#cartval' + id).val();
            cartvalue--;
            if (cartvalue != 0) {
                $.get("{{ url('cartvalue') }}" + "/" + cartvalue + "/" + proid + "/" + cartid, function(response) {
                    // $('#total' + id).empty();
                    // $('#total' + id).append('₹' + response.amount);
                    $('#payamount' + id).text(response.amount);
                    // console.log(response.amount);
                    totalcartamount();
                });
                $('#cartval' + id).val(cartvalue);
            }
        }

        function inc(id, proid, cartid) {
            // alert(cartid);
            var cartvalue = $('#cartval' + id).val();
            cartvalue++;
            $.get("{{ url('cartvalue') }}" + "/" + cartvalue + "/" + proid + "/" + cartid, function(response) {
                // $('#total' + id).empty();
                // $('#total' + id).append('₹' + response.amount);
                $('#payamount' + id).text(response.amount);
                // console.log(response.amount);
                totalcartamount();
            });
            $('#cartval' + id).val(cartvalue);
        }

        function totalcartamount() {
            var amount = 0;

            for (var i = 0; i < total; i++) {
                //console.log($('#payamount' + i).text());
                amount = amount + parseInt($('#payamount' + i).text());
            }
            $('#subtotal').text(amount);
        }

        function del(cartid) {

            $.get("{{ url('delete') }}" + "/" + cartid, function(response) {
                // console.log(response);
                window.location.reload();
            })

        }
    </script>
@endpush
