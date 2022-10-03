@extends('customers.layouts.main')
@push('title')
<title>Curtain & Blinders</title>
@endpush

@section('main-section')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper" style="padding-bottom: 0px; padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Checkout</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                <li class="active" aria-current="page">Checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Checkout Section:::... -->
<div class="checkout-section">
    <div class="container">
        @if (isset($message) && $message == true)
        <div class="d-flex justify-content-center">
            <p class="text-danger">{{ $message }}</p>
        </div>
        @endif
        <div class="row">
            @if (!session()->has('user_id'))
                <!-- User Quick Action Form -->
            <div class="col-12">
                <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="0">
                    <h3>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Returning customer?
                        <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login"
                            aria-expanded="true">Click here to login</a>
                    </h3>
                    <div id="checkout_login" class="collapse" data-parent="#checkout_login">
                        <div class="checkout_info">
                            <p>If you have shopped with us before, please enter your details in the boxes below.</p>
                            <form action="{{ route('customers.login') }}" method="post">
                                @csrf
                                <input type="hidden" value="1" name="guestUser">
                                <div class="form_group default-form-box">
                                    <label>Email <span>*</span></label>
                                    <input type="text" name="email">
                                </div>
                                <div class="form_group default-form-box">
                                    <label>Password <span>*</span></label>
                                    <input type="password" name="password">
                                </div>
                                <div class="form_group group_3 default-form-box">
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Quick Action Form -->
        </div>
            @endif
        <!-- Start User Details Checkout Form -->
        <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <form action="{{ route('customers.payment') }}" method="post">
                        @csrf
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label>First Name <span>*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label>Last Name <span>*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="default-form-box">
                                    <label>Company Name</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="default-form-box">
                                    <label for="country">country <span>*</span></label>
                                    <select class="country_option nice-select wide" name="country" id="country">
                                        <option value="2">Bangladesh</option>
                                        <option value="3">Algeria</option>
                                        <option value="4">Afghanistan</option>
                                        <option value="5">Ghana</option>
                                        <option value="6">Albania</option>
                                        <option value="7">Bahrain</option>
                                        <option value="8">Colombia</option>
                                        <option value="9">Dominican Republic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="default-form-box">
                                    <label>Street address <span>*</span></label>
                                    <input placeholder="House number and street name" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="default-form-box">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="default-form-box">
                                    <label>Town / City <span>*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="default-form-box">
                                    <label>State / County <span>*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label>Phone<span>*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="default-form-box">
                                    <label> Email Address <span>*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="payment_method">
                            @if (isset($message) && $message == true)
                            <div>
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                            @endif
                            <div class="panel-default">
                                <label class="checkbox-default" for="currencyPaypal" data-bs-toggle="collapse"
                                    data-bs-target="#methodPaypal">
                                    <input type="radio" value="CARD" name="paymentMethod" id="currencyPaypal">
                                    <span>Credit/Debit Card</span>
                                </label>
                            </div>
                            <div class="order_button pt-3">
                                <button class="btn btn-md btn-black-default-hover" type="submit">Proceed</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- Start User Details Checkout Form -->
    </div>
</div><!-- ...:::: End Checkout Section:::... -->
@endsection