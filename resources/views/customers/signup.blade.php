@extends('customers.layouts.main')
@push('title')
<title>Curtains & Blinders | Signup</title>
@endpush
@section('main-section')

<!-- ...:::: Start Customer Signup Section :::... -->
<div class="customer-login">
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <!--signup area start-->
            <div class="col-lg-6 col-md-12 mt-5">
                <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-center">Signup</h3>
                    <form action="{{ route('customers.create.account') }}" method="post">
                        @csrf
                        <div class="default-form-box">
                            <label>Full Name <span>*</span></label>
                            <input type="text" style="border-left: 1px solid grey; border-bottom: 1px solid grey" name="fullName">
                        </div>
                        <div class="default-form-box">
                            <label>Email address <span>*</span></label>
                            <input type="email" style="border-left: 1px solid grey; border-bottom: 1px solid grey" name="email">
                        </div>
                        <div class="default-form-box">
                            <label>Passwords <span>*</span></label>
                            <input type="password" style="border-left: 1px solid grey; border-bottom: 1px solid grey" name="password">
                        </div>
                        <div class="default-form-box">
                            <label>Confirm Passwords <span>*</span></label>
                            <input type="password" style="border-left: 1px solid grey; border-bottom: 1px solid grey" name="confirmPassword">
                        </div>
                        <div class="login_submit d-flex justify-content-center">
                            <button class="btn btn-md btn-black-default-hover" type="submit">Signup</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div> <!-- ...:::: End Customer Signup Section :::... -->

@endsection