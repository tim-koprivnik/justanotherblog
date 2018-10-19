<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Post;
use App\Photo;
use App\Comment;
use App\CommentReply;
use App\Category;

class AdminController extends Controller
{
    public function index() {
        $postsCount = Post::count();

        $usersCount = User::count();

        $categoriesCount = Category::count();

        $mediaCount = Photo::count();

        return view('admin.index', compact('postsCount', 'usersCount', 'categoriesCount', 'mediaCount'));
    }
}
