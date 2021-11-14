@extends('errors.errors_layout')
@section('title')
403 Error
@endsection

@section('error-content')

    <h2>404</h2>
    <p>Access to this resource on the server is denied</p>
    <p>{{ $exception->getMessage() }}</p>
    <a href="{{route('admin.dashboard')}}">Back to Dashboard</a>
    <a href="{{route('admin.login')}}">Login Again</a>

@endsection
