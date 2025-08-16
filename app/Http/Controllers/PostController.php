<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();
        return view('welcome', compact('posts'));
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
    



}
