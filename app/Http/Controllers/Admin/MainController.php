<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Comment;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Requestoffer;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $request_offers = Requestoffer::orderBy('id', 'desc')->paginate(5);
        $offers = Offer::get();

        $last_users = User::orderBy('id', 'desc')->limit(3)->get();

        $comments = Comment::orderBy('id', 'desc')->limit(3)->get();
        $posts = Post::get();
        $authors = Author::get();

        return view('admin.index', compact('request_offers', 'offers', 'last_users', 'comments', 'posts', 'authors'));
    }
}
