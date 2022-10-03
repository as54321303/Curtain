@extends('customers.layouts.main')
@push('title')
<title>Curtains & Blinders</title>
@endpush
@section('main-section')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper my-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">MyOrders</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li class="active" aria-current="page">MyOrders</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Cart Section:::... -->
<div class="cart-section my-0">
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
                                        <th class="product_name">Product</th>
                                        <th class="product_thumb">Color</th>
                                        <th class="product_quantity">Dimension</th>
                                        <th class="product-price">Total</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                <tbody>
                                    <!-- Start Cart Single Item-->
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->product_width }} X {{ $product->product_height }} Meters</td>
                                            <td>{{ $product->product_width*$product->product_height*$product->price }}</td>
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

    @endsection