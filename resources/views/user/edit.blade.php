@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary text-center mb-4">Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="card shadow p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
