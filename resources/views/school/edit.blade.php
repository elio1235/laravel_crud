@extends('layouts.app')

@section('content')
<div class="container w-50 mt-5">
    <h1 class="text-primary mb-4">Edit School</h1>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('school.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Important for resource controller -->

        <div class="mb-3">
            <label for="name" class="form-label">School Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $data->name) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('school.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
