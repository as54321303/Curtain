@extends('customers.layouts.main')
@push('title')
<title>Curtain & Blinders</title>
@endpush

@section('main-section')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container mt-5">
            <div class="d-flex justify-content-center">
                <div class="mt-5 text-center">
                    <h4>{{ $message }}</h4> 
                    <h5>Thankyou For Purching From Curtains & Blinders</h5>
                    <h5><a href="{{ route('customer.welcome') }}">Click Here</a> to Shop More</h5>
                </div>
            </div>
        </div>
    </div>
</div><!-- ...:::: End Checkout Section:::... -->

@endsection