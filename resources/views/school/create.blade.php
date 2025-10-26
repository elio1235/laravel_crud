@extends('layouts.app')



@section('content')
<div class="container">
    <h1>Create School</h1>
    <form action="{{ route('school.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">School Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
<button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection

