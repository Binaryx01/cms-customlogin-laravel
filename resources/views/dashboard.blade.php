
@extends('adminlayouts.app')
@section('content')


<h1>welcome to dashboard</h1>

<div class="container">
    @foreach($posts as $post)

    <h4>{{$post->title}}</h4>
    <h6>{{$post->content}}</h6>
    <a href="{{route('admindashboard.edit', $post->id)}}">Edit</a>
    <a href="#">Delete</a>

    <hr>

    @endforeach
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $posts->links() }}
</div>


@endsection