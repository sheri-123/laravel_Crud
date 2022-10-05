<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Image Crud</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"><img src="{{ asset('uploads/nav/playstore.png' ) }}" width="150px" height="50px" alt="Playstore image"></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Games <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">App</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Movies&Tv</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Kids</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="row">
@foreach($students as $item)
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
      <img src="{{ asset('uploads/product/'.$item->image ) }}" width="200px" height="120px" alt="image">
        <h5 class="card-title">{{ $item->name }}</h5>
        <p class="card-text">{{ $item->description }}</p>
        <p class="card-text">{{ $item->price }}</p>
        <a href="{{ url('edit-product/'.$item->id)}}" class="btn btn-success btn-sm">Edit</a>
         <a href="{{ url('delete-product/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
      </div>
    </div>
    
  </div>
  @endforeach
</div>
<div class="container my-3">
<a href="{{ url('add-product') }}" class="btn btn-primary btn-sm float-right">Add Application</a>    
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>