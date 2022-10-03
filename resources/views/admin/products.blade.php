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
                    <a href="{{ route('admin.add.product') }}" role="button" class="btn btn-primary">
                        <strong>+</strong> Add Product
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addColorModal">
                        <strong>+</strong> Add Color
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addFabricModal">
                        <strong>+</strong> Add Fabric
                    </button>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price/Sq. Meters</th>
                                        <th>In Stock (in Sq. Meters)</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($products))
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product['product_id'] }}</td>
                                        <td>{{ $product['product_name'] }}</td>
                                        <td>Rs. {{ $product['price'] }}</td>
                                        <td>{{ $product['remain'] }} Sq. Meters left</td>
                                        <td>{{ $product['name'] }}</td>
                                        <td><a href="{{ route('product.show', $product['product_id']) }}" role="button"
                                                class="btn btn-primary">View</a>
                                            <a role="button" class="btn btn-danger"
                                                onclick="postDelete({{ $product['product_id'] }})">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">Product Not Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Add Color Modal -->
<div class="modal fade" id="addColorModal" tabindex="-1" aria-labelledby="addColorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addColorModalLabel">Add a Color</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <label for="productName" class="form-label">Color Name</label>
                    <input type="text" class="form-control" id="colorName" name="colorName" required>
                </div>
                <div class="col-12 mt-2">
                    <button type="submit" id="addColorBtn" class="btn btn-primary">Add Color</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Fabric Modal -->
<div class="modal fade" id="addFabricModal" tabindex="-1" aria-labelledby="addFabricModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFabricModalLabel">Add a Fabric</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <label for="fabricName" class="form-label">Fabric Name</label>
                    <input type="text" class="form-control" id="fabricName" name="fabricName" required>
                </div>
                <div class="col-12 mt-2">
                    <button type="submit" id="addFabricBtn" class="btn btn-primary">Add Fabric</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function postDelete(id) {
        let product_id = id;
        $.ajax({     
            url: "{{ url('product/delete', '') }}" +'/'+ product_id,
            type: "DELETE",
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            success:function(response) {
                location.reload();
            },
            error:function(error) {
                console.log("ERROR: " +JSON.stringify(error));
            }
        });
    }

    var addColorBtn = document.getElementById('addColorBtn')
    addColorBtn.addEventListener('click', ()=> {
        var color = document.getElementById('colorName').value
        $.ajax({
            url: "{{ route('add.color') }}",
            type: "POST",
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            dataType: 'json',
            data: { color },
            success: function(response) {
                if (response['status'] == "1") {
                    swal({
                        title: "Success!",
                        text: "Color has been added successfully.",
                        icon: "success"
                    });
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                } else {
                    swal({
                        title: "Oops",
                        text: "Color is already in database.",
                        icon: "warning"
                    });
                }
            },
            error: function(error) {
                console.log('ERROR ' +JSON.stringify(error))
            }
        })
    })

    let fabBtn = document.getElementById('addFabricBtn')
    fabBtn.addEventListener('click', ()=> {
        let fabVal = document.getElementById('fabricName').value
        $.ajax({
            url: "{{ route('add.fabric') }}",
            type: "POST",
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            dataType: 'json',
            data: { fabVal },
            success: function(response) {
                alert(JSON.stringify(response))
            },
            error: function(error) {
                console.log("ERROR " +JSON.stringify(error))
            }
        })
    })
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection