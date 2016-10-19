<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\CommentReply;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminPanelController extends Controller
{
    public function index(){

        $medias = Photo::all();

        $categories = Category::all();

        $users = User::all();

        $posts = Post::all();

        $comments = Comment::all();

        $replies = CommentReply::all();

        return view('/admin/index', compact('users', 'posts', 'comments', 'replies', 'categories', 'medias'));

    }
}
