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
                    <h1 class="m-0 mb-3">Add a Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Products</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                    <form class="row g-3" action="{{ route('add.product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="productName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="productPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="productPrice" name="productPrice" min="1"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="productCategory" class="form-label">Product Category</label>
                            <select class="form-select" aria-label="Default select example" name="productCategory"
                                required>
                                @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}">{{ ucfirst($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-md-6">
                            <label for="productStock" class="form-label">In Stock, in Sq. Meters</label>
                            <input type="number" class="form-control" id="productStock" name="productStock" min="1"
                                required>
                        </div> --}}
                        <div class="col-md-6">
                            <label for="productImages" class="form-label">Images</label>
                            <input class="form-control" type="file" id="productImages" name="productImages[]" multiple
                                required>
                            <div class="form-text">Please Upload Images of only one color.</div>
                            <div class="form-text">You can upload other colors later.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="productColor" class="form-label">Color in Uploaded Image</label>
                            <select class="form-select" aria-label="Default select example" name="productColorId"
                                required>
                                @foreach ($color as $value)
                                <option value="{{ $value->color_id }}">{{ ucfirst($value->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="parentFab" class="col-md-12 mt-4">
                            <div id="childFab" class="col-md-12 mt-3">
                                <label for="productColor" class="form-label">Fabric Name</label>
                                <select class="form-select" aria-label="Default select example" name="productColorId"
                                    required>
                                    @foreach ($fabrics as $fabric)
                                    <option value="{{ $fabric->fabric_id }}">{{ ucfirst($fabric->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary more-fabric mx-2">Add More Fabric</button>
                        </div>
                        <div class="col-12 mb-5">
                            <button type="submit" class="btn btn-primary btn-block">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    // Apending Fabric Section
    let moreFabric = document.getElementsByClassName('more-fabric')
    Array.from(moreFabric).forEach(element => {
        element.addEventListener('click', ()=> {
            let parentDiv = document.getElementById('parentFab')
            let childDiv = document.getElementById('childFab')
            parentDiv.appendChild(childDiv.cloneNode(true))
        })
    })
</script>

@endsection