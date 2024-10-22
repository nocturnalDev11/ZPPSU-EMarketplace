<?php

namespace App\Http\Controllers\Admin\Lists;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostControllerManagement extends Controller
{
    public function index()
    {
        $totalPost = Post::count();
        $totalProduct = Post::where('post_list_type', 'Products')->count();
        $totalServices = Post::where('post_list_type', 'Services')->count();
        $totalTradings = Post::where('post_list_type', 'Trades')->count();

        $user = Auth::user();
        $posts = Post::get();
        $posts->each(function ($post) {
            $post->created_at = Carbon::parse($post->created_at)->diffForHumans();
        });

        return view('admin.lists.posts', compact(
            'totalPost',
            'totalProduct',
            'totalServices',
            'totalTradings',
            'posts',
            'user'
        ));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();

        $posts = Post::where('user_id', $post->user_id)
            ->where('id', '!=', $post->id)
            ->get();

        return view('admin.lists.posts', compact(
            'post',
            'posts',
            'user'
        ));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts')->with('success', 'Service deleted successfully');
    }
}
