@extends('backend.layouts.layouts')

@section('title')
    Users
@endsection

@section('admin-content')

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Users</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Users</span></li>
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
                        <h4 class="header-title">Users List Table</h4>
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{ route('admin.users.create') }}">Create New
                                User</a>
                        </p>
                        <div class="data-tables">

                            @include('backend.layouts.partials.messages')

                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th class="col-1">Sl</th>
                                        <th class="col-2">Image</th>
                                        <th class="col-3">Name</th>
                                        <th class="col-4">Email</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($users as $user)
                                   <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>
                                            <img src="{{ asset('upload/user_images/'.$user->user_img)}}" alt="" style="width:50px; height:50px">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a class="btn btn-success text-white" href="{{ route('admin.users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>

                                            <a class="btn btn-danger text-white" href="{{ route('admin.users.destroy', $user->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();"><i class="far fa-trash-alt"></i>
                                            </a>

                                            <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
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
