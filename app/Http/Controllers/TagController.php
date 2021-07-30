<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->FirstOrFail();
        $posts = $tag->posts()->orderBy('id', 'desc')->paginate(5);
        return view('tag.index', compact('tag', 'posts'));
    }

}
