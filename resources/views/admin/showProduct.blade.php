@extends('admin.adminLayouts.main')
@push('title')
<title>Curtain&Blinders Admin | Products</title>
@endpush
@push('linkcss')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
@endpush
@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 mb-3">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ $data['product_name'] }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="productDetails" data-toggle="pill" href="#vert-tabs-home"
                                    role="tab" aria-controls="vert-tabs-home" aria-selected="true">Home</a>
                                <a class="nav-link" id="imageDetails" data-toggle="pill" href="#vert-tabs-profile"
                                    role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Images</a>
                            </div>
                        </div>
                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel"
                                    aria-labelledby="productDetails">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="card card-primary card-outline">
                                                <div class="card-header d-flex justify-content-between">
                                                    <div class="card-title p-2">
                                                        <h6><strong>Product ID : </strong>{{ $data['product_id'] }}</h6>
                                                    </div>
                                                    <div class="card-title ml-auto p-2">
                                                        <button type="button" class="text-primary primary border-0"
                                                            data-bs-toggle="modal" data-bs-target="#updateProductModal">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <p>
                                                                    <label>Name</label>
                                                                </p>
                                                                <p>
                                                                    {{ $data['product_name'] }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <p>
                                                                    <label>Price (in Rs.)</label>
                                                                </p>
                                                                <p>
                                                                    Rs.{{ $data['price'] }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <p>
                                                                    <label>In Stock (In Meters)</label>
                                                                </p>
                                                                <p>
                                                                    {{ $data['remain'] }} meters left
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- /.card -->
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                    aria-labelledby="imageDetails">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="card card-primary card-outline">
                                                <div class="card-header d-flex justify-content-between">
                                                    <div class="card-title p-2">
                                                        <h6><strong>Product ID : </strong>{{ $data['product_id'] }}</h6>
                                                    </div>
                                                    <div class="card-title ml-auto p-2">
                                                        <button type="button" class="text-primary primary border-0"
                                                            data-bs-toggle="modal" data-bs-target="#addImages">
                                                            <strong>+ </strong> Add Images
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Image</th>
                                                                <th>Color</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (!empty($data))
                                                            @for ($i = 0; $i < count($data['get_images']); $i++) <tr>
                                                                <tr>
                                                                    <td><img src="{{ asset('storage/images/'.trim($data['get_images'][$i]['image_name'], '"')) }}" alt="image" style="width:70px; height:70px"></td>
                                                                    <td>
                                                                        @foreach ($allcolor as $key => $value)
                                                                        @if ($data['get_images'][$i]['color_id'] ==
                                                                        $key + 1)
                                                                        {{ $value }}
                                                                        @endif
                                                                        @endforeach
                                                                    </td>
                                                                    <td>
                                                                        <a role="button" class="btn btn-danger"
                                                                            onclick="productImageDelete({{ $data['get_images'][$i]['id'] }})">Delete
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endfor
                                                                @else
                                                                <tr>
                                                                    <td colspan="5" class="text-center">Product Not
                                                                        Found
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<!-- /.content-wrapper -->

<!-- Update Product Modal -->
<div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productUpdateModal">Update Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('update.product') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $data['product_id'] }}" name="productId">
                    <div class="col-md-6">
                        <label for="productName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="productName" value="{{ $data['product_name'] }}"
                            name="productName">
                    </div>
                    <div class="col-md-6">
                        <label for="productPrice" class="form-label">Price in Rs. Per Sq. Meter</label>
                        <input type="number" class="form-control" id="productPrice" value="{{ $data['price'] }}"
                            name="productPrice" min="1">
                    </div>
                    <div class="col-md-6">
                        <label for="productStock" class="form-label">Add to Stock, in Sq. Meters</label>
                        <input type="number" class="form-control" id="productStock" value="{{ $data['remain'] }}"
                            name="productStock" min="1">
                        <div class="form-check ml-2 mt-2">
                            <input class="form-check-input" type="checkbox" value="increment" name="remainInc"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Tick to Increment Value
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Image Modal -->
<div class="modal fade" id="addImages" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productUpdateModal">Add Images to Product ID : {{ $data['product_id'] }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('add.image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $data['product_id'] }}" name="productId">
                    <div class="col-md-12">
                        <label for="productImages" class="form-label">Images</label>
                        <input class="form-control" type="file" id="productImages" name="productImages[]" multiple
                            required>
                        <div class="form-text">Please Upload Images of only one color.</div>
                        <div class="form-text">You can upload other colors later.</div>
                    </div>
                    <div class="col-md-12">
                        <label for="productColor" class="form-label">Color in Uploaded Image</label>
                        <select class="form-select" aria-label="Default select example" name="productColorId" required>
                            <option selected>Select Color</option>
                            @foreach ($allcolor as $key => $color)
                            <option value="{{ $key }}">{{ $color }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Add Images</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function productImageDelete(id) {
        let image_id = id;
        $.ajax({     
            url: "{{ url('image/delete', '') }}" +'/'+ image_id,
            type: "DELETE",
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            success:function(response) {
                location.reload();
                alert("SUCCESS!: " +response);
            },
            error:function(error) {
                console.log("ERROR: " +JSON.stringify(error));
            }
        });
    }
</script>

@endsection