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


@endsection

