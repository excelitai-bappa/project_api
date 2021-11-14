@extends('backend.layouts.layouts')

@section('title')
    Role
@endsection

@section('admin-content')

    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Roles</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Roles</span></li>
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
                        <h4 class="header-title">Role List Table</h4>
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{ route('admin.roles.create') }}">Create New
                                Role</a>
                        </p>
                        <div class="data-tables">

                            @include('backend.layouts.partials.messages')

                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th class="col-2">Sl</th>
                                        <th class="col-2">Name</th>
                                        <th class="col-6">Permissions</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ ucfirst($role->name) }}</td>
                                            <td>
                                                @foreach ($role->permissions as $perm)
                                                    <span class="badge badge-info">
                                                        {{ $perm->name }}
                                                    </span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if (Auth::guard('admin')->user()->can('admin.edit'))
                                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                        class="btn btn-success"><i class="fas fa-edit"></i></a>

                                                @endif

                                                @if (Auth::guard('admin')->user()->can('admin.edit'))
                                                    <a href="{{ route('admin.roles.destroy', $role->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();"><i
                                                            class="far fa-trash-alt"></i>
                                                    </a>

                                                    <form id="delete-form-{{ $role->id }}"
                                                        action="{{ route('admin.roles.destroy', $role->id) }}"
                                                        method="POST" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    @php
                                        $i++;
                                    @endphp
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
