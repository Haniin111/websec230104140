@extends('layouts.master')
@section('title', 'SQLi Results')
@section('content')

<h1>Results for: <code>{{ $name }}</code></h1>

@if(count($results))
    <ul>
        @foreach($results as $product)
            <li>{{ $product->name }} - {{ $product->price }} EGP</li>
        @endforeach
    </ul>
@else
    <p>No matching products found.</p>
@endif

@endsection
