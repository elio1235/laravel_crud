@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary text-center mb-4">User Details</h2>

    <div class="card shadow p-4">
        <p><strong>First Name:</strong> {{ $user->first_name }}</p>
        <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Gender:</strong> {{ $user->gender }}</p>

        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</div>
@endsection