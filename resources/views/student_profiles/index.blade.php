@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Student Profiles</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Major</th>
            <th>Created By</th>
        </tr>
        @foreach($profiles as $profile)
        <tr>
            <td>{{ $profile->name }}</td>
            <td>{{ $profile->age }}</td>
            <td>{{ $profile->major }}</td>
            <td>{{ $profile->user->name }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
