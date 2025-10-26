@extends('layouts.app')

<!-- @section('title', 'Home') -->

@section('content')
<nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-address-book"></i>Address Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-clone"></i>Components</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-calendar-alt"></i>Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-chart-bar"></i>Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="far fa-copy"></i>Documents</a>
                </li>
            </ul>
        </div>
    </nav>
<header class="p-3 text-bg-dark"> <div class="container"> <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"> <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"> <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg> </a> <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"> <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li> <li><a href="#" class="nav-link px-2 text-white">Features</a></li> <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li> <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li> <li><a href="#" class="nav-link px-2 text-white">About</a></li> </ul> <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"> <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search"> </form> <div class="text-end"> <button type="button" class="btn btn-outline-light me-2">Login</button> <button type="button" class="btn btn-warning">Sign-up</button> </div> </div> </div> </header>
    <h1 class="text-primary">Welcome Home!</h1>
    <ul class="dropdown-menu position-static d-grid gap-1 p-2 rounded-3 mx-1 border-10 shadow w-220px" data-bs-theme="dark">
         <li><a class="dropdown-item rounded-2 active" href="#">Action</a></li> 
         <li><a class="dropdown-item rounded-2" href="#">Another action</a></li>
          <li><a class="dropdown-item rounded-2" href="#">Something else here</a></li> 
          <li><hr class="dropdown-divider"></li>
           <li><a class="dropdown-item rounded-2" href="#">Separated link</a></li>
         </ul>

         <ul class="dropdown-menu rounded-2 shadow p-2 show" style="width: 220px;" data-bs-theme="dark">
  <li><a class="dropdown-item active" href="#">Action</a></li>
  <li><a class="dropdown-item" href="#">Another action</a></li>
  <li><a class="dropdown-item" href="#">Something else here</a></li>
  <li><hr class="dropdown-divider"></li>
  <li><a class="dropdown-item" href="#">Separated link</a></li>
</ul>





        
@endsection
