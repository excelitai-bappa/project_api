@php
$usr = Auth::guard('admin')->user();
@endphp

<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{ asset('admin_assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="{{ route('admin.dashboard') }}"
                            class="{{ Route::is('admin.dashboard') ? 'active' : '' }}" aria-expanded="true"><i
                                class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>
                    @if (!$usr->hasRole('Employee') && !$usr->hasRole('Editor'))
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i
                                    class="ti-layout-sidebar-left"></i><span>
                                    Roles & Permissions
                                </span></a>
                            <ul
                                class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                                <li
                                    class="{{ Route::is('admin.roles.index') || Route::is('admin.roles.edit') ? 'active' : '' }}">
                                    <a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                                <li class="{{ Route::is('admin.roles.create') ? 'active' : '' }}"><a
                                        href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            </ul>
                        </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') || $usr->can('role.delete'))
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                    Users
                                </span></a>
                            <ul
                                class="collapse {{ Route::is('admin.users.create') || Route::is('admin.users.index') || Route::is('admin.users.edit') || Route::is('admin.users.show') ? 'in' : '' }}">
                                <li
                                    class="{{ Route::is('admin.users.index') || Route::is('admin.users.edit') ? 'active' : '' }}">
                                    <a href="{{ route('admin.users.index') }}">All Users</a></li>
                                <li class="{{ Route::is('admin.users.create') ? 'active' : '' }}"><a
                                        href="{{ route('admin.users.create') }}">Create User</a></li>
                            </ul>
                        </li>
                    @endif

                    @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') || $usr->can('admin.delete'))
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                    Admins
                                </span></a>
                            <ul
                                class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                                <li
                                    class="{{ Route::is('admin.admins.index') || Route::is('admin.admins.edit') ? 'active' : '' }}">
                                    <a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                                <li class="{{ Route::is('admin.admins.create') ? 'active' : '' }}"><a
                                        href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            </ul>
                        </li>
                    @endif
                    @if ($usr->can('product.create') || $usr->can('product.view') || $usr->can('product.edit') || $usr->can('product.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fab fa-accusoft"></i><span>
                            Products
                            </span></a>
                        <ul
                            class="collapse {{ Route::is('admin.products.create') || Route::is('admin.products.index') || Route::is('admin.products.edit') || Route::is('admin.products.show') ? 'in' : '' }}">
                            <li class="{{ Route::is('admin.products.index') || Route::is('admin.products.edit') ? 'active' : '' }}"> <a href="{{ route('admin.products.index') }}">All Products</a></li>
                            <li class="{{ Route::is('admin.products.create') ? 'active' : '' }}"><a href="{{ route('admin.products.create') }}">Add Product</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
