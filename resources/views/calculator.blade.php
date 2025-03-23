{{-- resources/views/calculator.blade.php --}}
@extends('layouts.master')

@section('title', 'Simple Calculator')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Simple Calculator</h2>

        <div class="row g-3">
            <div class="col-md-6">
                <input type="number" id="num1" class="form-control" placeholder="Enter first number">
            </div>
            <div class="col-md-6">
                <input type="number" id="num2" class="form-control" placeholder="Enter second number">
            </div>

            <div class="col-12 d-flex justify-content-between mt-3">
                <button class="btn btn-primary" onclick="calculate('+')">+</button>
                <button class="btn btn-success" onclick="calculate('-')">-</button>
                <button class="btn btn-warning" onclick="calculate('*')">*</button>
                <button class="btn btn-danger" onclick="calculate('/')">/</button>
            </div>

            <div class="col-12 mt-4">
                <h4 class="text-center">Result: <span id="result">--</span></h4>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function calculate(operation) {
        let num1 = parseFloat(document.getElementById('num1').value);
        let num2 = parseFloat(document.getElementById('num2').value);
        let result = 0;

        if (isNaN(num1) || isNaN(num2)) {
            alert("Please enter both numbers.");
            return;
        }

        switch(operation) {
            case '+': result = num1 + num2; break;
            case '-': result = num1 - num2; break;
            case '*': result = num1 * num2; break;
            case '/':
                if (num2 === 0) {
                    alert("Cannot divide by zero");
                    return;
                }
                result = num1 / num2;
                break;
        }

        document.getElementById('result').textContent = result;
    }
</script>
@endsection
