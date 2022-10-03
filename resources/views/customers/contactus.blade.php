@extends('customers.layouts.main')
@push('title')
<title>Curtains & Blinders | Contact Us</title>
@endpush
@section('main-section')

    <!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login">
        <div class="container mt-5">
            <div class="d-flex justify-content-center">
                <!--login area start-->
                <div class="col-lg-6 col-md-12 mt-5">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3 class="text-center">Contact Us</h3>
                        <form action="#" method="POST">
                            <div class="default-form-box">
                                <label>Username or email <span>*</span></label>
                                <input type="text" style="border-left: 1px solid grey; border-bottom: 1px solid grey">
                            </div>
                            <div class="default-form-box">
                                <label>Your Message <span>*</span></label>
                                <textarea cols="30" rows="10" style="border-left: 1px solid grey; border-bottom: 1px solid grey"></textarea>
                            </div>
                            <div class="login_submit d-flex justify-content-center">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Send</button>
                                <label class="checkbox-default mb-4" for="offer">
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->

@endsection    