@extends('layouts.app')

@section('content')
<div class="container w-50 mt-5">
    <h1 class="text-primary mb-4">Create Course</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('course.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="school_id" class="form-label">Select School</label>
            <select name="school_id" id="school_id" class="form-select" required>
                <option value="" disabled selected>-- Choose School --</option>
                @foreach ($school as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
            @error('school_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="teacher_id" class="form-label">Select Teacher</label>
            <select name="teacher_id" id="teacher_id" class="form-select" disabled required>
                <option value="">-- Choose Teacher --</option>
            </select>
            @error('teacher_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>

{{-- JavaScript --}}
<script>
document.getElementById('school_id').addEventListener('change', function() {
    const schoolId = this.value;
    const teacherSelect = document.getElementById('teacher_id');
    teacherSelect.innerHTML = '<option value="">-- Choose Teacher --</option>';

    if (schoolId) {
        teacherSelect.disabled = false;
       
    }

    fetch(`/course/getTeachers/${schoolId}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(teacher => {
                const option = document.createElement('option');
                option.value = teacher.id;
                option.textContent = teacher.name;
                teacherSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching teachers:', error));
});
</script>
@endsection
