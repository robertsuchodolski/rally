<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use App\Http\Requests\MyProfileEditRequest;
use App\Http\Requests\UsersEditRequest;
use App\Photo;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index(){

        $user = Auth::user();

        $comments = Comment::where('author', Auth::user()->name);

        $replies = CommentReply::where('author', Auth::user()->name);

        $posts = Post::where('user_id', Auth::user()->id);

        return view ('user/index', compact('user', 'posts', 'comments', 'replies'));
    }

    public function show($id){

    }

    public function edit($id){
        $user = User::findOrFail($id);

        $roles = Role::pluck('name','id')->all();

        return view('user.edit', compact('user','roles'));
    }

    public function update(MyProfileEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if(trim($request->passowrd == '')){
            $input = $request->except('password');
        }else {
            $input = $request->all();
        }

        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);

        $user->update($input);

        return redirect('/user');
    }
}
