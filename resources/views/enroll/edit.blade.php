@extends('layouts.app')

@section('content')
<div class="container w-50 mt-5">
    <h1 class="text-primary mb-4">Edit Course</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('course.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Course Name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" name="name" class="form-control" id="name"
                   value="{{ old('name', $course->name) }}" required>
        </div>

        {{-- School --}}
        <div class="mb-3">
            <label for="school_id" class="form-label">Select School</label>
            <select name="school_id" id="school_id" class="form-select" required>
                <option value="">-- Choose School --</option>
                @foreach ($school as $s)
                    <option value="{{ $s->id }}"
                        {{ old('school_id', $course->school_id) == $s->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
            @error('school_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- Teacher --}}
        <div class="mb-3">
            <label for="teacher_id" class="form-label">Select Teacher</label>
            <select name="teacher_id" id="teacher_id" class="form-select" required>
                <option value="">-- Choose Teacher --</option>
                {{-- teachers will be loaded dynamically --}}
            </select>
            @error('teacher_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

{{-- JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const schoolSelect = document.getElementById('school_id');
    const teacherSelect = document.getElementById('teacher_id');
    const currentTeacherId = "{{ old('teacher_id', $course->teacher_id) }}";

    // load teachers for selected school (and select current teacher)
    function loadTeachers(schoolId, selectedTeacherId = null) {
        teacherSelect.innerHTML = '<option value="">-- Choose Teacher --</option>';
        if (!schoolId) return;

        fetch(`/course/getTeachers/${schoolId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(teacher => {
                    const option = document.createElement('option');
                    option.value = teacher.id;
                    option.textContent = teacher.name;
                    if (selectedTeacherId && teacher.id == selectedTeacherId) {
                        option.selected = true;
                    }
                    teacherSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching teachers:', error));
    }

    // Initial load (for already assigned school)
    loadTeachers(schoolSelect.value, currentTeacherId);

    // When user changes school
    schoolSelect.addEventListener('change', function () {
        loadTeachers(this.value);
    });
});
</script>
@endsection
