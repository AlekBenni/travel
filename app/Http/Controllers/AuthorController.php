<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Comment;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($slug)
    {
        $author = Author::where('slug', $slug)->firstOrFail();
        $posts = $author->posts()->orderBy('id', 'desc')->paginate(3);
        $comments = Comment::where('post_slug', $slug)->get();
        return view('author.index', compact('author', 'posts', 'comments'));
    }
}
