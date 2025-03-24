@extends('layouts.master')
@section('title', 'Products')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Product Catalog</h2>


    @auth
        <div class="alert alert-info">
            Your Credit: <strong>{{ auth()->user()->credit }} EGP</strong>
        </div>
    @endauth

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($products as $product)
        <div class="col">
            <div class="card h-100">
                <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text">{{ $product['description'] }}</p>
                    <p class="fw-bold">Price: {{ $product['price'] }} EGP</p>

                    @auth
                        <form method="POST" action="{{ route('buy') }}">
                            @csrf
                            <input type="hidden" name="name" value="{{ $product['name'] }}">
                            <input type="hidden" name="price" value="{{ $product['price'] }}">
                            <button type="submit" class="btn btn-primary">Buy</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary">Login to Buy</a>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
