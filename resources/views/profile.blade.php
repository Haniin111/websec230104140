@extends('layouts.master')
@section('title', 'Products')

@section('content')
<div class="container mt-4">
   
    <form action="{{ route('add.balance') }}" method="POST" class="d-flex gap-2 mb-3">
        @csrf
        <input type="number" name="amount" class="form-control" placeholder="Enter amount" required>
        <button type="submit" class="btn btn-primary">Add Balance</button>
    </form>

    
    <p class="mt-3">💰 Your Balance: {{ auth()->user()->balance }} EGP</p>

   
    @if (session('status'))
        <div class="alert alert-success mt-2">
            {{ session('status') }}
        </div>
    @endif
</div>
@endsection
