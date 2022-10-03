@extends('customers.layouts.main')
@push('title')
<title>Curtains & Blinders | Welcome</title>
@endpush
@section('main-section')

<!-- ...:::: Start Customer Signup Section :::... -->
<div class="customer-login mb-0">
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="mt-5 text-center">
                <h4>Welcome to Curtains & Blinders</h4>
                <h5>You Account has been Created!</h5> 
                <h5><a href="{{ route('customers.login') }}">Click Here</a> to Login Now</h5>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Customer Signup Section :::... -->

@endsection