@extends('layouts.app')
@section('content')


<br><br>

<div class="container">
    @foreach($posts as $post)

    <h1>{{$post->title}}</h1>
    <h5>{{$post->content}}</h5>



    <hr>

    @endforeach
</div>


<div class="d-flex justify-content-center mt-3">
    {{ $posts->links() }}
</div>

@endsection

