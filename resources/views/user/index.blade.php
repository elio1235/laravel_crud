@extends('layouts.app')
@section('content')
 <h1 class="text-primary text-center">User list </h1>
 <div class="container d-flex justify-content-center">
  <div class="w-50">

     <form action="{{ route('users.index') }}" method="GET" class="mb-4 d-flex justify-content-center">
            <input type="text" name="search_name" value="{{ request('search_name') }}" 
                   placeholder="Search by name" class="form-control me-2" style="max-width: 200px;">
            <input type="text" name="search_email" value="{{ request('search_email') }}" 
                   placeholder="Search by email" class="form-control me-2" style="max-width: 200px;">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">Reset</a>
        </form>
<table class="table table-striped table-hover">
      <thead>
    <tr>
      
      <th scope="col">last_name</th>
      <th scope="col">first_name </th>
      <th scope="col">Email</th>
        <th scope="col">gender</th>
    </tr>
  </thead>
  
        <tbody>
            @foreach($users as $user)
    <tr>
    
      <td>{{$user->last_name}}</td>
      <td>{{$user->first_name}}</td>
      <td>{{$user->email}}</td>
          <td>{{$user->gender}}</td>
           <td>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this user?')">
                            Delete
                        </button>
                    </form>
                </td>
     
    @endforeach 
        </tbody>
    
</table>
</div>
 </div>
@endsection