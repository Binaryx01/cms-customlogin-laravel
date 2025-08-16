<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::paginate(5);
        return view('welcome', compact('posts'));
    }

    public function dashboard()
    {
        $posts = Post::paginate(5);
        return view('dashboard',compact('posts'));

    }


    public function create()
    {
        return view('admindashboard.create');


    }

     public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            
        ]);

        return redirect()->back()->with('success', 'Post created successfully!');
    }
    
public function edit(Post $post)
{
    // Pass the post variable to the view correctly
    return view('admindashboard.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    // Update only the fillable fields
    $post->update($request->only(['title', 'content']));

    return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
}
}
