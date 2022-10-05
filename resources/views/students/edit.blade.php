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
<title>Update Application</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">         
            <div class="col-md-6"> 
                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
                @endif  
                @if (session('status'))
                <h6 class="alert alert-success">{{session('status')}}</h6>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4> Edit application
                            <a href="{{ url('students') }}" class="btn btn-danger btn-sm float-right">Back</a>
                        </h4>
                        <div class="card-body">
                            <form action="{{url('update-product/'.$student->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" value="{{$student->name}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <textarea name="description"  class="form-control">{{$student->description}}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for=""> Price</label>
                                <input type="number" name="price" value="{{$student->price}}" class="form-control">
                            </div>   
                            <div class="form-group mb-3">
                                <label for="">Upload Image</label>
                                <input type="file" name="image" value="{{$student->image}}" class="form-control">
                                <img src="{{asset('uploads/product/'.$student->image)}}" width="70px" height="70px" alt="image">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>