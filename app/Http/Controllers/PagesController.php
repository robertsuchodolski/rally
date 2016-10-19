<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Post::orderBy('created_at','desc')->get();

        $posts = Post::orderBy('created_at','desc')->paginate(6);

        $random = Post::all();

        $photos =  $random->random(8);

        return view('/index', compact('posts', 'slides', 'categories', 'photos'));

    }

    public function showPhotos(){

        $posts = Post::all();

        return view('/gallery', compact('posts'));

    }

    public function about(){

        return view('/about');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $comments = $post->comments()->whereIsActive(1)->get();

        return view('post', compact('post', 'comments', 'categories'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
