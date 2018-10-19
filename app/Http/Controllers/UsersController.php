<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session; //for using sessions

use App\User; //for using models
use App\Role;
use App\Post;
use App\Photo;
use App\Comment;
use App\CommentReply;
use App\Category;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(); //select all users
        
        return view('admin.users.index', compact('users')); 
        //return "index.blade.php" from "resources/views/admin/users" folder
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if password is not set
        if(trim($request->password) == '') {
            $input = $request->except('password');
        } else { //if password is set
            $input = $request->all();
            $input['password'] = bcrypt($request->password); //encrypt password
        }

        //if there is a file (photo) chosen, add this file to "photos" table + put it in "images" folder
        if($file = $request->file('photo_id')) { //"photo_id" is column in "users" table
            // $name = time() . $file->getClientOriginalName();
            $name = $file->getClientOriginalName(); //give this file a name
            $file->move('images', $name); //move it to images folder with given/defined name
            $photo = Photo::create(['file'=>$name]); //add it in "photos" table to column "file" with given name
            $input['photo_id'] = $photo->id;
        }

        //create user
        User::create($input);

        //redirect to "admin/users"
        return redirect('admin/users');
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
        $user = User::findOrFail($id); //find specific user
        
        $roles = Role::pluck('name', 'id')->all();
        
        return view('admin.users.edit', compact('user', 'roles'));
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
        $user = User::findOrFail($id);

        //if password is not set
        if(trim($request->password) == '') {
            $input = $request->except('password');
        } else { //if password is set
            $input = $request->all();
            $input['password'] = bcrypt($request->password); //encrypt password
        }
        
        //if there is a file (photo)
        if($file = $request->file('photo_id')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        unlink(public_path() . $user->photo->file);  //deletes/unlinks photo/file from "images" folder

        $user->delete();

        //flash message that user has been deleted
        Session::flash('deleted_user', 'The user has been deleted.');

        return redirect('admin/users');
    }
}
