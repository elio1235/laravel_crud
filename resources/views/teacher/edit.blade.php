@extends('layouts.app')

@section('content')
<div class="container w-50 mt-5">
    <h1 class="text-primary mb-4">Edit Teacher</h1>

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

    <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Important for resource controller -->

        <div class="mb-3">
            <label for="name" class="form-label">teacher Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $teacher->name) }}" required>
        </div>
        
       <div class="mb-3">
    <label for="school_id" class="form-label">Select School</label>
    <select name="school_id" id="school_id" class="form-select" required>
        <option value="">-- Choose School --</option>
        @foreach ($school as $s)
            <option value="{{ $s->id }}"
                {{ old('school_id', $teacher->school_id) == $s->id ? 'selected' : '' }}>
                {{ $s->name }}
            </option>
        @endforeach
    </select>
    @error('school_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>


        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
