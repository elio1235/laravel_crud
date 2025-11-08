<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My Laravel App')</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;" data-bs-theme="light">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('school.index')}}" route>School</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('student.index')}}">Student</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('teacher.index')}}">Teacher</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('course.index')}}">Course</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('enroll.index')}}">enroll</a>
      </li>
       </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('signup.create')}}">Signup</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">users</a>
      </li>
      
    </ul>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit" fdprocessedid="knnn0p">Search</button>
    </form>
  </div>
</div>
</nav>
        <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;" data-bs-theme="light">
           
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar w/ text</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
      <span class="navbar-text">
        Navbar text with an inline element
      </span>
    </div>
  </div>
</nav> -->
    </header>

    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>
