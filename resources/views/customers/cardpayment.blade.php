@extends('customers.layouts.main')
@push('title')
<title>Curtain & Blinders | Card Payment</title>
@endpush

@section('main-section')

<div class="container" style="width: 400px; margin-top: 80px">
    <form class="row g-3" action="{{ route('imdt.process') }}" method="post">
        @csrf
        <div class="col-12">
            <label for="cardHolder" class="form-label">Card Holder Name</label>
            <input type="text" class="form-control" id="cardHolder">
          </div>
        <div class="col-md-12">
          <label for="cardNumber" class="form-label">Card Number</label>
          <input type="text" class="form-control" id="cardNumber" minlength="16" maxlength="16">
        </div>
        <div class="col-md-6">
          <label for="expiryDate" class="form-label">Expiry Date</label>
          <input type="month" class="form-control" id="expiryDate">
        </div>
        <div class="col-md-6">
          <label for="cvv" class="form-label">CVV</label>
          <input type="password" class="form-control" id="cvv" minlength="3" maxlength="3">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-success" style="width: 380px;">Pay</button>
        </div>
      </form>
</div>

@endsection
