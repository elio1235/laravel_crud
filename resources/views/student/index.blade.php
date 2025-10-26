@extends('layouts.app')



@section('content')
<a type="button" class="btn btn-outline-primary" href="{{route('student.create')}}">Create</a>
 <h1 class="text-primary text-center">student list</h1>
 <div class="container d-flex justify-content-center">
  <div class="w-50">
<table class="table table-striped table-hover">
      <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">school name </th>
      <th scope="col">action</th>
    </tr>
  </thead>
    @foreach($data as $student){
        <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{$student->id}}</td>
      <td>{{$student->name}}</td>
      <td>{{$student->school->name}}</td>
      <td>    <a class="btn btn-sm btn-warning" href="{{ route('student.edit', $student->id) }}">Edit</a>
                        
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this school?')">Delete</button>
                        </form></td>

    </tr>
        </tbody>
    }
    @endforeach 
</table>
</div>
 </div>
@endsection

