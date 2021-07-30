<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $search = $request->search;
        $posts = Post::where('title', 'LIKE', "%{$search}%")->paginate(3);
        return view('post.search', compact('posts', 'search'));
    }
}
