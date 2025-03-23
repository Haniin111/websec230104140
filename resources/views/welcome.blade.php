
@extends('layouts.master')
@section('title', 'Products')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <h1 class="fw-bold">🚀 Welcome to WebSecServe</h1>
                <p class="lead">Please login or sign up to continue</p>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
