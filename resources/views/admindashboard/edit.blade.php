@extends('adminlayouts.app')
@section('content')

<h1>Edit your Post</h1>

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="title" class="form-label">Post Title</label>
        <input type="text" name="title" id="title" class="form-control" 
               value="{{ old('title', $post->title) }}" required>
    </div>
    
    <div class="mb-3">
        <label for="content" class="form-label">Post Content</label>
        <textarea name="content" id="content" rows="4" class="form-control" required>{{ old('content', $post->content) }}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Publish</button>
</form>
    

@endsection
