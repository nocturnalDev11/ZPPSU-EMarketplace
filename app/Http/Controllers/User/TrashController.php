<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;

class TrashController extends Controller
{
    // Move a post to trash
    public function trashPost($id)
    {
        $post = Post::findOrFail($id);

        // Check if the authenticated user is the owner of the post
        if (auth()->id() === $post->user_id) {
            // Move to trash logic (for example, update status or move to another table)
            // You can implement soft delete or move the item to a trash table

            // For example, update the status or move to a trash table
            // $post->update(['status' => 'trashed']); OR PostTrash::create($post->toArray());

            return redirect()->back()->with('success', 'Post moved to trash successfully');
        }

        return redirect()->back()->with('error', 'You are not authorized to move this post to trash');
    }

    // Restore a post from trash
    public function restorePost($id)
    {
        // Implement logic to restore a post from trash
        // Example: $post = PostTrash::findOrFail($id); $post->restore();

        return redirect()->back()->with('success', 'Post restored successfully');
    }

    // Delete a post permanently from trash
    public function deletePost($id)
    {
        // Implement logic to delete a post permanently
        // Example: $post = PostTrash::findOrFail($id); $post->delete();

        return redirect()->back()->with('success', 'Post permanently deleted');
    }
}
