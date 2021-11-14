@extends('backend.layouts.layouts')

@section('title')
    Add Product
@endsection

@section('admin-content')

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Add Product</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Add Product</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">

                @include('backend.layouts.partials.logout')

            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Add New Product</h4>

                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        placeholder="Enter Product Name" value="{{ old('product_name') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="product_qty">Product Quantity</label>
                                    <input type="text" class="form-control" id="product_qty" name="product_qty"
                                        placeholder="Product Quantity" value="{{ old('product_qty') }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="product_price">Product Price</label>
                                    <input type="text" class="form-control" id="product_price" name="product_price"
                                        placeholder="Enter Product Price" value="{{ old('product_price') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="produt_discount_price">Discount Price</label>
                                    <input type="text" class="form-control" id="produt_discount_price"
                                        name="produt_discount_price" placeholder="Product Discount Price"
                                        value="{{ old('produt_discount_price') }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="phone">Product Image</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="product_img">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="product_img" id="inputGroupFile01"
                                                aria-describedby="product_img">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Product</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>

@endsection



@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
    </script>
@endsection
