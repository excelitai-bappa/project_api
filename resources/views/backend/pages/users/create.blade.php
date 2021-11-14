@extends('backend.layouts.layouts')

@section('title')
    User Create
@endsection

@section('admin-content')

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">User Create</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Create Role</span></li>
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
                        <h4 class="header-title">Create New User</h4>

                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="user_phone">Contact Number</label>
                                    <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="Enter Contact Number"
                                        value="{{ old('user_phone') }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="user_address">Address</label>
                                    <input type="text" class="form-control" id="user_address" name="user_address"
                                        placeholder="Enter Address" value="{{ old('user_address') }}">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="phone">Image</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="user_img">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="user_img" id="inputGroupFile01"
                                                aria-describedby="user_img">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
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
