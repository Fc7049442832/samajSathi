<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('Blog', compact('blogs'));
    }
    
    public function filterBlogs(Request $request)
    {
        $type = $request->category;
        
    
        $blogs = Blog::when($type, function ($query) use ($type) {
            return $query->where('type', $type);
        })->latest()->get();
    
        return view('Blog', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::with('comments.replies.user')->findOrFail($id);
        $blogs = Blog::latest()->get()->where('id', '!=', $id);

        // Increase view count
        $blog->increment('views');

        return view('singleBlog', compact('blog','blogs'));
    }

    public function like($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->increment('likes');
        return response()->json(['likes' => $blog->likes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'comment' => 'required|string',
        ]);

        Comment::create([
            'blog_id' => $request->blog_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'parent_id' => $request->parent_id, // For replies
        ]);

        return back()->with('success', 'Comment added!');
    }


    // Blog manage for  functions 
    public function manage_blog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog', compact('blogs'));
    }

    // public function blog_create()
    // {
    //     return view('blog_create');
    // }

    public function blog_store(Request $request)
    {

        $request->validate([    
            'title' => 'required|string',
            'type' => 'required|string',
            'content'=> 'required| string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048,'
        ]);

        $imagePath = null; // Default NULL if no image is uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public'); // Store in storage/app/public/blog_images
        }

        Blog::create([
            'title'  => $request->title,
            'type'    => $request->type,
            'image'   => $imagePath, // Store image path if uploaded
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Blog post created successfully!');
    }
    // admin blog edit page return function
    public function blog_edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog_edit', compact('blog'));
    }

    // Blog Update function code ...
    public function blog_update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional
        ]);
    
        $blog = Blog::findOrFail($id); // Fetch the blog post
    
        // Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete Old Image (if exists)
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
    
            // Store New Image
            $imagePath = $request->file('image')->store('blog_images', 'public');
            $blog->image = $imagePath;
        }
    
        // Update Other Fields
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->content = $request->content;
        $blog->save();
    
        return redirect()->route('admin.blog')->with('success', 'Blog updated successfully!');
    }

    // Blog Delete function code...
    public function blog_destroy($id)
    {
        $blog = Blog::findOrFail($id); // Fetch the blog post

        // Delete Image from Storage (if exists)
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        // Delete Blog from Database
        $blog->delete();

        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }
    
}
