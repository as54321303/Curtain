@extends('customers.layouts.main')
@push('title')
<title>Curtains & Blinders</title>
@endpush
@section('main-section')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Cart</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                <li class="active" aria-current="page">Cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Cart Section:::... -->
<div class="cart-section">
    <!-- Start Cart Table -->
    <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        @if (session()->has('user_id'))
                                        <th class="product_remove">Remove</th>
                                        @endif
                                        <th class="product_name">Product</th>
                                        @if (session()->has('user_id'))
                                        <th class="product-price">Price</th>
                                        @endif
                                        <th class="product_thumb">Color</th>
                                        <th class="product_quantity">Dimension</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                <tbody>
                                    <!-- Start Cart Single Item-->
                                    @foreach ($data as $item)
                                    <tr>
                                        @if (session()->has('user_id'))
                                        <td><a role="button" onclick="removeFromCart({{ $item->cart_id }})">Remove</a></td>
                                        <td class="product_name"><a href="product-details-default.html">{{
                                                $item->product_name }}</a></td>
                                        <td class="product_quantity">Rs. {{ $item->price }} / Sq. Meter</td>
                                        @foreach ($colors as $key => $value)
                                            @if ($key == $item->color_id)
                                                <td class="product_thumb d-flex justify-content-center">
                                                    <div>
                                                        {{ $value }}
                                                    </div>
                                                    <div>
                                                        <i class="ml-3 fas fa-circle fa-2x text-{{ strtolower($value) }}"></i>
                                                    </div>
                                                </td>
                                            @endif
                                        @endforeach
                                        <td class="product_quantity"><label>{{ $item->product_width }} X {{ $item->product_height }} Meters</label></td>
                                        <td class="product_total">Rs. {{ $item->price * $item->product_width * $item->product_height }}</td>

                                        @else
                                        
                                        <td class="product_name"><a href="product-details-default.html">{{
                                                $item['product_name'] }}</a></td>
                                        @foreach ($colors as $key => $value)
                                            @if ($key == $item['color_id'])
                                                <td class="product_thumb d-flex justify-content-center">
                                                    <div>
                                                        {{ $value }}
                                                    </div>
                                                    <div>
                                                        <i class="ml-3 fas fa-circle fa-2x text-{{ strtolower($value) }}"></i>
                                                    </div>
                                                </td>
                                            @endif
                                        @endforeach
                                        <td class="product_quantity"><label>{{ $item['product_width'] }} X {{ $item['product_height'] }} Meters</label></td>
                                        <td class="product_total">Rs. {{ $item['price'] }}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    <!-- End Cart Single Item-->
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="cart_submit">
                            <button class="btn btn-md btn-golden" type="submit">update cart</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->

    <!-- Start Coupon Start -->
    <div class="coupon_area">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-6 col-md-6">
                    <div class="coupon_code left" data-aos="fade-up" data-aos-delay="200">
                        <h3>Coupon</h3>
                        <div class="coupon_inner">
                            <p>Enter your coupon code if you have one.</p>
                            <input class="mb-2" placeholder="Coupon code" type="text">
                            <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount">Rs. {{ $cart_total['subtotal'] }}</p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Shipping</p>
                                <p class="cart_amount"><span>Flat Rate:</span> Rs. {{ $cart_total['shipping'] }}</p>
                            </div>
                            <a href="#">Calculate shipping</a>

                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount">Rs. {{ $cart_total['total'] }}</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="{{ route('customers.checkout') }}" class="btn btn-md btn-golden">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Coupon Start -->
</div> <!-- ...:::: End Cart Section:::... -->

<script>
    function removeFromCart(id) {
        var cartId = id
        
        $.ajax({
            url: "{{ route('removefrom.cart', '') }}" +'/'+cartId,
            type: 'DELETE',
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            success:function(response) {
                setTimeout(() => {
                    location.reload()
                }, 1500);
                swal({
                    title: "Success!", 
                    text: response,
                    icon: "success"
                })
            },
            error:function(error) {
                alert("ERROR: " +JSON.stringify(error))
            }
        })
    }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection