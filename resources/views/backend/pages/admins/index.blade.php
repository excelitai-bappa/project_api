@extends('backend.layouts.layouts')

@section('title')
    Admins
@endsection

@section('admin-content')

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Admins</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Admins</span></li>
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
                        <h4 class="header-title">Admins List Table</h4>
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{ route('admin.admins.create') }}">Create New
                                User</a>
                        </p>
                        <div class="data-tables">

                            @include('backend.layouts.partials.messages')

                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th class="col-1">Sl</th>
                                        <th class="col-1">Image</th>
                                        <th class="col-2">Name</th>
                                        <th class="col-4">Email</th>
                                        <th class="col-1">Roles</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)

                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('upload/admin_images/'.$admin->img)}}" alt="" style="width:50px; height:50px">
                                            </td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>
                                                @foreach ($admin->roles as $role)
                                                    <span class="badge badge-info mr-1">
                                                        {{ $role->name }}
                                                    </span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if (Auth::guard('admin')->user()->can('admin.edit'))
                                                    <a class="btn btn-success text-white"
                                                        href="{{ route('admin.admins.edit', $admin->id) }}"><i
                                                            class="fas fa-edit"></i></a>
                                                @endif

                                                @if (Auth::guard('admin')->user()->can('admin.delete'))
                                                    <a class="btn btn-danger text-white"
                                                        href="{{ route('admin.admins.destroy', $admin->id) }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();"><i
                                                            class="far fa-trash-alt"></i>
                                                    </a>

                                                    <form id="delete-form-{{ $admin->id }}"
                                                        action="{{ route('admin.admins.destroy', $admin->id) }}"
                                                        method="POST" style="display: none;">
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
