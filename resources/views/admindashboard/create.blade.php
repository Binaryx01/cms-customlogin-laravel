@extends('adminlayouts.app')
@section('content')





    <h1>Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Post Content</label>
            <textarea name="content" id="content" rows="4" class="form-control" required></textarea>
        </div>
        <label for="category">Select Category:</label>
        <select name="category_id" id="category" required>
            <option value="">-- Choose Category --</option>
            @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['categoryname'] }}</option>
            @endforeach
        </select>


        <button type="submit" class="btn btn-primary">Publish</button>
    </form>

@endsection