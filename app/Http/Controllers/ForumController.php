<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments.user')->get();

        return view('forum.index', compact('posts'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required'
        ]);

        $user = Auth::user();

        $post = new Post();
        $post->user_id = $user->id;
        $post->subject = $request->subject;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('forum.index');
    }

    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect()->route('forum.index');
    }
}
