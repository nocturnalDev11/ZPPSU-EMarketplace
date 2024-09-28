<?php

namespace App\Http\Controllers\User\Lists;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_title' => 'required|string|max:255',
            'post_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'post_list_type' => 'required|string',
            'post_content' => 'required|string|max:65535'
        ]);

        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('post_picture')) {
            $path = $request->file('post_picture')->store('posts_pictures', 'public');
            $validatedData['post_picture'] = $path;
        }

        Post::create($validatedData);
        return redirect()->route('lists.posts.index');
    }

    public function index()
    {
        $user = Auth::user();
        $posts = Post::get();
        $posts->each(function ($post) {
            $post->created_at = Carbon::parse($post->created_at)->diffForHumans();
        });

        return view('users.lists.posts.index', compact('posts', 'user'));
    }

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

        return view('users.lists.posts.details', compact('post', 'posts', 'user', 'relatedPosts'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() === $post->user_id) {
            $post->delete();
            return redirect()->route('lists.posts.index')->with('success', 'Post deleted successfully');
        }

        return redirect()->route('lists.posts.index')->with('error', 'You are not authorized to delete this post');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() !== $post->user_id) {
            return redirect()->route('home')->with('error', 'You are not authorized to edit this post');
        }
        return view('users.lists.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() !== $post->user_id) {
            return redirect()->route('users.home')->with('error', 'You are not authorized to update this post');
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
