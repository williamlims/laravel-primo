@extends('layouts.app')

@section('title', '| Dashboard')

@section('content')
    <a href="{{ route('logout') }}" class="position-absolute top-0 end-0 link-secondary p-3">
        <i class="bi bi-box-arrow-right fs-3"></i>
    </a>
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <h1>Dashboard</h1>
    </div>
@endsection
