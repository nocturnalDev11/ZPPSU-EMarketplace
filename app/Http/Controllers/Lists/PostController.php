<?php

namespace App\Http\Controllers\Lists;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Store a newly created post in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_title' => 'required|string|max:255',
            'post_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'post_list_type' => 'required|string',
            'post_content' => 'required|string|max:65535'
        ]);

        $validatedData['user_id'] = auth()->id();

        if ($request->hasFile('post_picture')) {
            $path = $request->file('post_picture')->store('posts_pictures', 'public');
            $validatedData['post_picture'] = $path;
        }

        Post::create($validatedData);
        return redirect()->route('lists.posts.index');
    }

    // Display a list of all posts
    public function index()
    {
        $user = Auth::user();
        $posts = Post::get();
        $posts->each(function($post) {
            $post->created_at = Carbon::parse($post->created_at)->diffForHumans();
        });

        return view('lists.posts.index', compact('posts', 'user'));
    }

    // Show a specific post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();

        $posts = Post::where('user_id', $post->user_id)
                     ->where('id', '!=', $post->id)
                     ->get();
        $relatedPosts = Post::where('post_list_type', $post->post_list_type)
                            ->where('id', '!=', $post->id)
                            ->get();

        return view('lists.posts.details', compact('post', 'posts', 'user', 'relatedPosts'));
    }

    // Delete a specific post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() === $post->user_id) {
            $post->delete();
            return redirect()->route('lists.posts.index')->with('success', 'Post deleted successfully');
        }

        return redirect()->route('lists.posts.index')->with('error', 'You are not authorized to delete this post');
    }

    // Show the form for editing a specific post
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() !== $post->user_id) {
            return redirect()->route('home')->with('error', 'You are not authorized to edit this post');
        }
        return view('lists.posts.edit', compact('post'));
    }

    // Update a specific post
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() !== $post->user_id) {
            return redirect()->route('user.home')->with('error', 'You are not authorized to update this post');
        }

        $validatedData = $request->validate([
            'post_title' => 'required|string|max:255',
            'post_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'post_list_type' => 'required|string',
            'post_content' => 'required|string|max:65535'
        ]);

        if ($request->hasFile('post_picture')) {
            $path = $request->file('post_picture')->store('posts_pictures', 'public');
            $validatedData['post_picture'] = $path;
        }

        $postContent = $validatedData['post_content'];
        if (strlen($postContent) > 65535) {
            $validatedData['post_content'] = substr($postContent, 0, 65535);
        }

        $post->update($validatedData);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully');
    }
}
