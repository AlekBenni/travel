<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(5);
        return view('post.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $comments = Comment::where('post_slug', $slug)->get();
        $other_post = Post::where('slug', !$slug)->limit(2)->inRandomOrder()->get();
        $post->view += 1;
        $post->update();
        return view('post.show', compact('post', 'other_post', 'comments'));
    }
}
