@extends('backend.layouts.layouts')

@section('title')
    Role Edit
@endsection

@section('admin-content')

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admin Update</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                        <li><span>Edit Admin - {{ $admin->name }}</span></li>
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
                        <h4 class="header-title">Edit Admin - {{ $admin->name }}</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                        value="{{ $admin->name }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" value="{{ $admin->email }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="phone">Contact Number</label>
                                    <input type="phone" class="form-control" id="phone" name="phone"
                                        placeholder="Contact Number" value="{{ $admin->phone }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $admin->username }}" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter Password">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Enter Password">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-6">
                                    <label for="password">Assign Roles</label>
                                    <select name="roles[]" id="roles" class="form-control select2" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"
                                                {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="password">Image</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="img">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="img" id="inputGroupFile01"
                                                aria-describedby="img">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>

                                    <img src="{{ asset('upload/admin_images/' . $admin->img) }}" alt=""
                                    class="w-25">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Admin</button>
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
