@extends('layouts.app')
@section('content')


 <br>
 <br>
 

<div class ="container">
<h3>Register here</h3>

<form action="{{route('posts.register')}}" method="POST" >
@csrf
 <div class="form-group mb-3">
    <label for="text">Name</label>
    <input type="text" name="name" class="form-control" id="name"  placeholder="Enter your name" required>
  </div>



  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name=email class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group mb-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control"  placeholder="Password">
  </div>

     <div class="form-group mb-3">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control"  placeholder="Password">
  </div>


  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


@endsection