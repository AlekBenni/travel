<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $data = $request->all();
        $data['author'] = Auth::user()->name;
        $data['post_slug'] = $id;

        Comment::create($data);

        return redirect()->back();
    }
}
