@extends('layouts.app')



@section('content')
<style>
    .error {
        color: red;
        margin-top: 5px;
        font-size: 14px;
    }
    </style>

<form action="{{ route('signup.store') }}" method="POST" style="max-width: 400px; margin: 0 auto;">
    @csrf
<div style="display: flex; flex-direction: column; gap: 8px;">
    <label>First Name</label>
    <input type="text" name="first_name" value="{{ old('first_name') }}">
    @error('first_name') <p class="error" >{{ $message }}</p> @enderror

    <label>Last Name</label>
    <input type="text" name="last_name" value="{{ old('last_name') }}">
    @error('last_name') <p class="error" >{{ $message }}</p> @enderror

    <label>Gender:</label><br>

<input type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
<label for="male">Male</label>

<input type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
<label for="female">Female</label>

@error('gender') <p class="error" >{{ $message }}</p> @enderror

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email') <p class="error" >{{ $message }}</p> @enderror

    <label>Password</label>
    <input type="password" name="password">
    @error('password') <p class="error" >{{ $message }}</p> @enderror

    <label>Confirm Password</label>
    <input type="password" name="password_confirmation">
    @error('password_confirmation') <p class="error" >{{ $message }}</p> @enderror

   
    <button type="submit">Submit</button>
</div>
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
</form>


@endsection