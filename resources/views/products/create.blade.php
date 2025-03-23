@extends('layouts.app')

@section('content')
    <h1>Add New Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        
        <label>Price:</label>
        <input type="number" name="price" required>
        
        <button type="submit">Add Product</button>
    </form>
@endsection
