@extends('layouts.master')
@section('title', 'Products')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Product Catalog</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($products as $product)
        <div class="col">
            <div class="card h-100">
                <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text">{{ $product['description'] }}</p>
                    <p class="fw-bold">Price: {{ $product['price'] }} EGP</p>
                    <a href="#" class="btn btn-success">Add to Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
