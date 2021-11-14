@extends('backend.layouts.layouts')

@section('title')
    Products
@endsection

@section('admin-content')

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Products</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Products</span></li>
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
            <!-- seo fact area start -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Products List Table</h4>
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{ route('admin.products.create') }}">Create New
                                Product</a>
                        </p>
                        <div class="data-tables">

                            @include('backend.layouts.partials.messages')

                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th class="col-1">Sl</th>
                                        <th class="col-2">Image</th>
                                        <th class="col-4">Name</th>
                                        <th class="col-1">Quantity</th>
                                        <th class="col-1">Price</th>
                                        <th class="col-1">Discount Price</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($products as $product)
                                   <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>
                                            <img src="{{ asset('upload/product_images/'.$product->product_img)}}" alt="" style="width:50px; height:50px">
                                        </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_qty }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>{{ $product->produt_discount_price }}</td>
                                        <td>
                                            @if (Auth::guard('admin')->user()->can('product.edit'))
                                            <a class="btn btn-success text-white" href="{{ route('admin.products.edit', $product->id) }}"><i class="fas fa-edit"></i></a>
                                            @endif

                                            <a class="btn btn-success text-white" href="{{ route('admin.products.show', $product->id) }}"><i class="fas fa-eye"></i></a>

                                            @if (Auth::guard('admin')->user()->can('product.delete'))
                                            <a class="btn btn-danger text-white" href="{{ route('admin.products.destroy', $product->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();"><i class="far fa-trash-alt"></i>
                                            </a>

                                            <form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- seo fact area end -->
        </div>
    </div>

@endsection
