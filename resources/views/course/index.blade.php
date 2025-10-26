@extends('layouts.app')



@section('content')
<a type="button" class="btn btn-outline-primary" href="{{route('course.create')}}">Create</a>
 <h1 class="text-primary text-center">Course list</h1>
 <div class="container d-flex justify-content-center">
  <div class="w-50">
<table class="table table-striped table-hover">
      <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">school name </th>
      <th scope="col"> Teacher name </th>
      <th scope="col">action</th>
    </tr>
  </thead>
    @foreach($data as $course){
        <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{$course->id}}</td>
      <td>{{$course->name}}</td>
      <td>{{$course->school->name}}</td>
      <td>{{$course->teacher->name}}</td>
      <td>    <a class="btn btn-sm btn-warning" href="{{ route('course.edit', $course->id) }}">Edit</a>
                        
                        <form action="{{ route('course.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                        </form></td>

    </tr>
        </tbody>
    }
    @endforeach 
</table>
</div>
 </div>
@endsection

