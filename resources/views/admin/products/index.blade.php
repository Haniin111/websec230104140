@extends('layouts.app')

@section('content')
    <h1>Products</h1>

    @foreach ($products as $product)
        <div>
            <h3>{{ $product->name }} - ${{ $product->price }}</h3>
            <form method="POST" action="{{ url('/buy/' . $product->id) }}">
                @csrf
                <button type="submit">Buy</button>
            </form>
        </div>
    @endforeach
@endsection
