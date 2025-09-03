<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category; // import Category
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display all posts
    public function index()
    {
        // Eager load category to avoid N+1 query problem
        $posts = Post::with('category')->get();
        return view('welcome', compact('posts'));
    }

    // Show create post form
    public function create()
    {
        // Fetch all categories to populate a dropdown in form
        $categories = Category::all();
        return view('admindashboard.create', compact('categories'));
    }

    // Store new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id', // validate category
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'category_id' => $request->category_id, // save category
        ]);

        return redirect()->back()->with('success', 'Post created successfully!');
    }


// app/Http/Controllers/PostController.php

public function showByCategory($slug)
{
    // Find category by slug
    $category = \App\Models\Category::where('categoryslug', $slug)->firstOrFail();

    // Get posts belonging to this category
    $posts = $category->posts()->latest()->get();

    return view('posts.category', compact('category', 'posts'));
}





}
