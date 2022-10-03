@extends('customers.layouts.main')
@push('title')
<title>Curtains & Blinders</title>
@endpush
@section('main-section')

<!-- Start Product Default Slider Section -->
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper mt-5" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap mb-3">
                        <div class="secton-content">
                            <h3 class="section-title">the New arrivals</h3>
                            <p>Preorder now to receive exclusive deals & gifts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-2rows default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-2row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach ($newArrivals as $newArrival)
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--aqua swiper-slide">
                                    <div class="image-box">
                                        <a href="{{ route('customers.product', $newArrival['product_id']) }}" class="image-link">
                                            @if (isset($newArrival['image_name']))
                                            <img src="{{ asset('storage/images/'.trim($newArrival['image_name'], '"')) }}" alt="" style="height: 200px;">
                                            <img src="{{ asset('storage/images/'.trim($newArrival['image_name'], '"')) }}" alt="" style="height: 200px;">
                                            @else
                                            <h6>No Preview</h6>
                                            @endif
                                        </a>
                                        <div class="tag">
                                            <span>sale</span>
                                        </div>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="{{ route('customers.product', $newArrival['product_id']) }}">View</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details-default.html">{{ $newArrival['product_name'] }}</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">Rs. {{ $newArrival['price'] }} per Meter</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                @endforeach
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper mt-5" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap mb-3">
                        <div class="secton-content">
                            <h3 class="section-title">Curtains</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-2rows default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-2row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach ($curtains as $curtain)
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--aqua swiper-slide">
                                    <div class="image-box">
                                        <a href="{{ route('customers.product', $curtain['product_id']) }}" class="image-link">
                                            @if (!empty($curtain['image_name']))
                                            <img src="{{ asset('storage/images/'.trim($curtain['image_name'], '"')) }}" alt="" style="height: 200px;">
                                            <img src="{{ asset('storage/images/'.trim($curtain['image_name'], '"')) }}" alt="" style="height: 200px;">
                                            @else
                                            <h6>No Preview</h6>
                                            @endif
                                        </a>
                                        <div class="tag">
                                            <span>sale</span>
                                        </div>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="{{ route('customers.product', $curtain['product_id']) }}">View Curtain</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="{{ route('customers.product', $curtain['product_id']) }}">{{ $curtain['product_name'] }}</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">Rs. {{ $curtain['price'] }} per Meter</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                @endforeach
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper mt-5" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap mb-3">
                        <div class="secton-content">
                            <h3 class="section-title">Blinders</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-2rows default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-2row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach ($blinders as $blinder)
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--aqua swiper-slide">
                                    <div class="image-box">
                                        <a href="{{ route('customers.product', $blinder['product_id']) }}" class="image-link">
                                            @if (!empty($blinder['image_name']))
                                            <img src="{{ asset('storage/images/'.trim($blinder['image_name'], '"')) }}" alt="" style="height: 200px;">
                                            <img src="{{ asset('storage/images/'.trim($blinder['image_name'], '"')) }}" alt="" style="height: 200px;">
                                            @else
                                            <h6>No Preview</h6>
                                            @endif
                                        </a>
                                        <div class="tag">
                                            <span>sale</span>
                                        </div>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="{{ route('customers.product', $blinder['product_id']) }}">View Blinder</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="{{ route('customers.product', $blinder['product_id']) }}">{{ $blinder['product_name'] }}</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">Rs. {{ $blinder['price'] }} per Meter</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                @endforeach
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- End Product Default Slider Section -->



@endsection