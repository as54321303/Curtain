@extends('customers.layouts.main')
@push('title')
<title>Curtains & Blinders</title>
@endpush
@push('style')
<style>
    .active {
        display: block;
    }

    .invisible {
        display: none;
    }
</style>
@endpush
@section('main-section')
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{ $data[0]['product_name'] }}</h3>
                        @if (!empty($data[0]['image_name']))
                        @for ($i = 0; $i < count($data); $i++)
                        <div @if ($i == 0) class="active-preview active" @else class="active-preview invisible" @endif id="{{ $data[$i]['color_id'] }}">
                            {{-- Main Image --}}
                            <div class="col-12 active">
                                <img src="{{ asset('storage/images/'.trim($data[$i]['image_name'][0], '"')) }}" class="product-image" alt="Product Image" style="height: 500px">
                            </div>
                            {{-- Side Images --}}
                            <div class="col-12 product-image-thumbs">
                            @for ($j = 0; $j < count($data[$i]['image_name']); $j++) 
                                <div class="product-image-thumb active">
                                <img src="{{ asset('storage/images/'.trim($data[$i]['image_name'][$j], '"')) }}" alt="Product Image" style="height: 80px" class="side-product-image">
                                </div>
                            @endfor
                            </div>
                        </div>
                        @endfor
                    @else
                    <div class="col-12">
                        <h3>No Preview</h3>
                    </div>
                    @endif
                </div>
                <div class="col-12 col-sm-6 bg">
                    <h3 class="my-3">
                        {{ $data[0]['product_name'] }} </h3>
                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown
                                aliqua
                                butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>

                            <hr>
                            <h4>Available Colors</h4>
                            <div class="btn-group">
                                <div class="toogle-color" style="display: flex;">
                                    @for($i = 0; $i < count($data); $i++) 
                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="colorOption" id="{{ $data[$i]['color_id'] }}" value="{{ $data[$i]['color_id'] }}"
                                            autocomplete="off" @if ($i==0) checked @endif>
                                        {{ ucfirst($data[$i]['name']) }}
                                        <br>
                                        <i class="fas fa-circle fa-2x text-{{ strtolower($data[$i]['name']) }}"></i>
                                        </label>
                                        @endfor
                                </div>
                            </div>

                            <h4 class="mt-3">Size <small>Please Enter Size in Meters</small></h4>
                            <div class="btn-group btn-group-toggle">
                                <div class="col-md-3">
                                    <label for="inputEmail4" class="form-label">Width</label>
                                    <input type="text" class="form-control" id="input_width" placeholder="in Meters"
                                        name="input_width">
                                </div>
                                <div class="col-md-3">
                                    <label for="input_height" class="form-label">Height</label>
                                    <input type="text" class="form-control" id="input_height" placeholder="in Meters"
                                        name="input_height">
                                </div>
                                <div class="col-md-3">
                                    <label for="output_price" class="form-label">Fabric</label>
                                    {{-- <output type="text" class="form-control" id="output_price"
                                        name="output_price"></output> --}}
                                        <select name="fabric" id="select_fabric">
                                            <option selected disabled>Select Fabric</option>
                                   @foreach ($fabrics as $fabric)
                                   <option value="{{$fabric->fabric_id}}">{{$fabric->name}}</option>
                                   @endforeach

                                        </select>
                                </div>
                                {{-- <div class="col-md-3">
                                    <label for="get_price" class="form-label">Click Here</label>
                                    <button type="submit" class="btn btn-primary" id="get_price"
                                        value="{{ $data[0]['product_id'] }}">Get
                                        Price</button>
                                </div> --}}
                            </div>

                            <div class="row mt-5 pb-5" style="display: none" id="colors">
                                @foreach($images as $image)
                                <div class="col-sm-3" >
                                   
                                
                                        <input type="radio" style="width: 10px;" name="color">
                                        <img src="{{ asset('storage/images/'.$image->image_name) }}" style="height: 100px;width:90px">

                                        <h5>Color</h5>
                                   

           
                             </div>
                                    @endforeach

                            </div>

                            <div class="row mt-5 p-3" style="display: none" id="additional">
                                <div class="col-sm-4">
                                    <h4>Side Winder/Brackets*</h4>
                                    <ul class="mt-3">
                                        <li>
                                            <input type="radio" name="color1" style="width: 20px;"> <span>  Off White </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="color1" style="width: 20px;"> <span>  Black </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="color1" style="width: 20px;"> <span>  Grey </span>
                                        </li>
                                    </ul>

                                </div>
                                <div class="col-sm-4">
                                    <h4>Bottom Rail*</h4>

                                    <ul class="mt-3">
                                        <li>
                                            <input type="radio" name="bottom_rail" style="width: 20px;"> <span> Silver </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="bottom_rail" style="width: 20px;"> <span>  White </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="bottom_rail" style="width: 20px;"> <span>  Off White </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="bottom_rail" style="width: 20px;"> <span>  Black </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="bottom_rail" style="width: 20px;"> <span> Sterling(Grey)</span>
                                        </li>
                                    </ul>

                                </div>
                                <div class="col-sm-4">
                                    <h4>Roll*</h4>

                                    <ul class="mt-3">
                                        <li>
                                            <input type="radio" name="roll" style="width: 20px;"> <span>  Front </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="roll" style="width: 20px;"> <span>  Back </span>
                                        </li>
                                    </ul>

                                </div>

                                <div class="col-sm-6 mt-5">

                                    <h4>Chain *</h4>

                                    <ul class="mt-3">
                                        <li>
                                            <input type="radio" name="chain" style="width: 20px;"> <span> White (Plastic)</span>
                                        </li>
                                        <li>
                                            <input type="radio" name="chain" style="width: 20px;"> <span> Off White (Plastic)</span>
                                        </li>
                                        <li>
                                            <input type="radio" name="chain" style="width: 20px;"> <span>  Grey (Plastic) </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="chain" style="width: 20px;"> <span>  Black (Plastic) </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="chain" style="width: 20px;"> <span>  Silver (Metal) </span>
                                        </li>
                                    </ul>


                                </div>
                                <div class="col-sm-6 mt-5">
                                    <h4>Control Side *</h4>

                                    <ul class="mt-3">
                                        <li>
                                            <input type="radio" name="control_side" style="width: 20px;"> <span>  Left Side </span>
                                        </li>
                                        <li>
                                            <input type="radio" name="roll" style="width: 20px;"> <span>  Right Side </span>
                                        </li>
                                    </ul>

                                </div>
                            </div>




                             

                            <div class="mt-4">
                                <h4>Total</h4>
                                <output type="text" class="form-control" id="output_price"
                                name="output_price" style="width: 50%;"></output>
                                <div class="btn btn-primary btn-lg btn-flat mt-1">
                                   
                                    <button type="submit" onclick="addToCart({{ $data[0]['product_id'] }})"><i
                                            class="fas fa-cart-plus fa-lg mr-2"></i>
                                        Add to Cart</button>
                                </div>
                            </div>

                            <div class="mt-4 product-share">
                                <a href="#" class="text-gray">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-envelope-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-rss-square fa-2x"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>
<script>
    var radioBtn = document.querySelectorAll('.toogle-color > label > input')
    var photos = document.querySelectorAll('.active-preview')
    Array.from(radioBtn).forEach(element => {
        element.addEventListener('click', (e)=> {
            Array.from(photos).forEach(photo => {
                if (photo.classList.contains('active')) {
                    photo.setAttribute('class', 'invisible')
                }
                if (e.target.getAttribute('id') == photo.getAttribute('id')) {
                    photo.setAttribute('class', 'active')
                    var sideImg = photo.querySelector('.side-product-image').getAttribute('src')
                    var mainImg = photo.querySelector('.product-image')
                    mainImg.setAttribute('src', sideImg)
                }
            })
        })
    });

    $(document).ready(function() {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
      });

            $('#select_fabric').change(function(){


                var width = document.getElementById('input_width').value;
                var height = document.getElementById('input_height').value;
                var productId = $(this).val();
                $.ajax({
                    url: "{{ route('calculate.price') }}",
                    type: "GET",
                    dataType: 'json',
                    data: { width, height, productId },
                    headers: {
                        'X-CSRF-Token': "{{ csrf_token() }}"
                    },
                    success:function(response) {
                        console.log(response);
                        document.getElementById('output_price').innerHTML ='<div class="text-danger">'+"Rs."+response+'</div>';
                    },
                    error:function(error) {
                        alert("ERROR: " +JSON.stringify(error));
                        console.log("ERROR: " +JSON.stringify(error));
                    }
                });

                $('#colors').show();
                $('#additional').show();
            
            });


               



    })

    // var priceBox = document.getElementById('get_price');
    // priceBox.addEventListener("click", ()=> {
    //     var width = document.getElementById('input_width').value;
    //     var height = document.getElementById('input_height').value;
    //     var productId = document.getElementById('get_price').value;
    //     $.ajax({
    //         url: "{{ route('calculate.price') }}",
    //         type: "GET",
    //         dataType: 'json',
    //         data: { width, height, productId },
    //         headers: {
    //             'X-CSRF-Token': "{{ csrf_token() }}"
    //         },
    //         success:function(response) {
    //             document.getElementById('output_price').innerHTML = response;
    //         },
    //         error:function(error) {
    //             alert("ERROR: " +JSON.stringify(error));
    //             console.log("ERROR: " +JSON.stringify(error));
    //         }
    //     })
    // })




 


    function addToCart(id) {
        var productId = id
        var height = document.getElementById('input_height').value
        var width = document.getElementById('input_width').value
      
        if (height != "" && width != "") {
            var colorId = document.querySelector('input[name="colorOption"]:checked')
            if (colorId != null) {
                colorId = colorId.value
                $.ajax({
                url: "{{ route('cart.value') }}",
                type: "GET",
                dataType: 'json',
                data: { productId, colorId, width, height },
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                },
                success:function(response) {
                    console.log(response);
                    var cart = document.getElementById('cart_value').innerHTML
                    document.getElementById('cart_value').innerHTML = parseInt(cart) + response['inc_cart_by']
                    // alert(JSON.stringify(response['message']))
                },
                error:function(error) {
                    alert("ERROR: " +JSON.stringify(error));
                    console.log("ERROR: " +JSON.stringify(error));
                }
            })            
            } else {
                // alert("Please Select Color")
            }
        }
        else {
            // alert("Please Enter Height and Width of Product")
        }
    }
</script>

@endsection