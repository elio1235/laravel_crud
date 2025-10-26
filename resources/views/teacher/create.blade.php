@extends('layouts.app')



@section('content')
<div class="container">
    <h1>Create Student</h1>
    <form action="{{ route('teacher.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">teacher Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="school_id" class="form-label">Select School</label>
            <select name="school_id" id="school_id" class="form-select">
                <option value="">-- Choose School --</option>
                @foreach ($school as $s)
                    <option value="{{ $s->id }}">
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
            @error('school_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
<button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection

