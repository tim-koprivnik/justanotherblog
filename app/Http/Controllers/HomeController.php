<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\User;
use App\Role;
use App\Post;
use App\Photo;
use App\Comment;
use App\CommentReply;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); //if OFF, people don't have to login too see and use the blog
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);

        $categories = Category::all();

        $year = Carbon::now()->year;

        return view('home', compact('posts', 'categories', 'year'));
    }

}
