<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use App\User;
use App\Role;
use App\Post;
use App\Photo;
use App\Comment;
use App\CommentReply;
use App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        
        $posts = Post::paginate(8); //showing 8 posts on 1 page
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        
        $authors = User::pluck('name', 'id')->all();
        
        return view('admin.posts.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $user = Auth::user();
        
        if($file = $request->file('photo_id')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        //public function "user has many posts" in "User" model -- creates post related to user that is logged in
        $user->posts()->create($input);
        // Post::create($input);
        
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

        $authors = User::pluck('name', 'id')->all();
        
        return view('admin.posts.edit', compact('post', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        
        $input = $request->all();

        //if there is any image (file) chosen ...
        if($file = $request->file('photo_id')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        //no matter what, do this
        $post->update($input);

        // Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        unlink(public_path() . $post->photo->file); //deletes/unlinks photo/file from "images" folder

            // $file_path = public_path() . '/' . $post->photo->file;
            // unlink($file_path);

        $post->delete();

        // I WANT TO ALSO DELETE "file" from "photos" folder !!!!!!!!!!!

        return redirect('admin/posts');
    }


    // CUSTOM FUNCTION
    public function post($slug)
    {
        $post = Post::findBySlugOrFail($slug);

        $comments = $post->comments()->whereIsActive(1)->get();

            // $replies = $post->replies()->whereIsActive(1)->get();

        $categories = Category::all();

        $year = Carbon::now()->year;

        return view('post', compact('post', 'comments', 'categories', 'year'));

    }

}
