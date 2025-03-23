@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Student Profile</h2>
    <form method="POST" action="{{ route('student_profiles.store') }}">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Age:</label>
        <input type="number" name="age" required><br>

        <label>Major:</label>
        <input type="text" name="major" required><br>

        <button type="submit">Create Profile</button>
    </form>
</div>
@endsection
