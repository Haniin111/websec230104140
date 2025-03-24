{{-- resources/views/minitest.blade.php --}}
@extends('layouts.master')
@extends('layouts.app')

@section('content')
@extends('layouts.master')
@section('title', 'Products')
@section('title', 'MiniTest Supermarket Bill')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Supermarket Bill</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price (EGP)</th>
                        <th>Total (EGP)</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach ($bill as $item)
                        @php
                            $total = $item['quantity'] * $item['price'];
                            $grandTotal += $total;
                        @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['price'], 2) }}</td>
                            <td>{{ number_format($total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-primary">
                        <td colspan="3"><strong>Grand Total</strong></td>
                        <td><strong>{{ number_format($grandTotal, 2) }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
