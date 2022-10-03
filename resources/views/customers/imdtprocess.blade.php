@extends('customers.layouts.main')
@push('title')
<title>Curtain & Blinders</title>
@endpush
@push('style')
<style>
    .invisible {
        display: none;
    }
</style>
@endpush
@section('main-section')

<div class="container mb-0" style="margin-top: 120px">
    <div class="d-flex justify-content-center">
        <div class="mt-5 text-center">
            <h4>Congratulations! Your Order has been Placed Successfully</h4>
            <h5>Thankyou For Purching From Curtains & Blinders</h5>
            <h5><a href="{{ route('customer.welcome') }}">Click Here</a> to Shop More</h5>
        </div>
    </div>
</div>

<script>
    // var invi = document.querySelector('.invisible')
    // var spinner = document.querySelector('.spinner')
    // setTimeout(() => {
    //     invi.classList.remove('invisible')
    //     spinner.classList.add('invisible')
    // }, 4000);
</script>
@endsection