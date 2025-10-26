@extends('layouts.app')



@section('content')
<a type="button" class="btn btn-outline-primary" href="{{route('enroll.create')}}">Create</a>
 <h1 class="text-primary text-center">enroll list</h1>
 <div class="container d-flex justify-content-center">
  <div class="w-50">
<table class="table table-striped table-hover">
      <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">student name </th>
      <th scope="col"> course name </th>
       <th scope="col">teacher name </th>
      <th scope="col"> school name </th>
      <th scope="col">action</th>
    </tr>
  </thead>
    @foreach($data as $enroll){
        <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{$enroll->id}}</td>
      <td>{{$enroll->student->name}}</td>
      <td>{{$enroll->course->name}}</td>
      <td>{{$enroll->course->teacher->name}}</td>
      <td>{{$enroll->student->school->name}}</td>
      <td>    <a class="btn btn-sm btn-warning" href="{{ route('enroll.edit', $enroll->id) }}">Edit</a>
                        
                        <form action="{{ route('enroll.destroy', $enroll->id) }}" method="POST" style="display:inline-block;">
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

