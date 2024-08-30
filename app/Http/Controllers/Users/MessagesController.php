<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Eager load the latest message for each user the authenticated user has communicated with
        $users = User::where(function ($query) {
            $query->whereExists(function ($subQuery) {
                $subQuery->selectRaw(1)
                         ->from('messages')
                         ->whereRaw('messages.sender_id = users.id')
                         ->where('messages.recipient_id', Auth::id());
            })
            ->orWhereExists(function ($subQuery) {
                $subQuery->selectRaw(1)
                         ->from('messages')
                         ->whereRaw('messages.recipient_id = users.id')
                         ->where('messages.sender_id', Auth::id());
            });
        })
        ->where('id', '!=', Auth::id())
        ->with(['sentMessages' => function ($query) {
            $query->where('recipient_id', Auth::id())->latest();
        }, 'receivedMessages' => function ($query) {
            $query->where('sender_id', Auth::id())->latest();
        }])
        ->get()
        ->map(function ($userItem) {
            $userItem->latestMessage = $userItem->sentMessages->merge($userItem->receivedMessages)->sortByDesc('created_at')->first();
            return $userItem;
        });

        $selectedUser = null;
        $messages = [];

        if ($request->has('id')) {
            $selectedUser = User::findOrFail($request->id);
            $messages = Message::where(function ($query) use ($selectedUser) {
                $query->where('sender_id', Auth::id())
                      ->where('recipient_id', $selectedUser->id)
                      ->orWhere('sender_id', $selectedUser->id)
                      ->where('recipient_id', Auth::id());
            })->orderBy('created_at', 'asc')->get();
        }

        return view('users.messages.index', compact('users', 'selectedUser', 'messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/mpeg|max:10240',
            'content_link' => 'nullable|url',
            'content_link_image' => 'nullable|string',
            'content_link_description' => 'nullable|string',
        ]);

        $message = new Message();
        $message->sender_id = Auth::id();
        $message->recipient_id = $request->recipient_id;
        $message->content = $request->content;
        $message->content_link = $request->content_link;
        $message->content_link_image = $request->content_link_image;
        $message->content_link_description = $request->content_link_description;

        if ($request->hasFile('image')) {
            $message->image = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('video')) {
            $message->video = $request->file('video')->store('videos', 'public');
        }

        $message->save();

        return back()->with('success', 'Message sent successfully!');
    }

    public function reply(Request $request, User $user)
    {
        $request->validate([
            'replyContent' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $reply = new Message();
        $reply->sender_id = Auth::id();
        $reply->recipient_id = $user->id;
        $reply->content = $request->input('replyContent');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $reply->image = $imagePath;
        }

        $reply->save();

        return redirect()->route('messages.index', ['id' => $user->id])->with('success', 'Reply sent successfully!');
    }
}
