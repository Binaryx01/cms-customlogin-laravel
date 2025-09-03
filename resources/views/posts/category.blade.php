<h1>Posts in {{ $category->categoryname }}</h1>

@foreach($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>Category: {{ $post->category->categoryname }}</p>
    </div>
@endforeach