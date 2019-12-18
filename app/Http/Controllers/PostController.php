<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){

        $posts = Post::all();


        return view('Layouts.index', ['posts' => $posts]);
    }


    public function create(){

        return view('Layouts.create');
    }

    public function insert(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $Post=new Post;
        $Post->title = $request->title;
        $Post->content = $request->content;
        $Post->save();


        return redirect()->route('posts.index');
    }

    public function edit($id){
        $post = Post::find($id);

        return view('Layouts.edit', ['post' => $post]);
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $Post =  Post::find($id);
        $Post->title = $request->title;
        $Post->content = $request->content;
        $Post->save();


        return redirect()->route('posts.index');
    }

    public function delete($id){
        Post::find($id)->delete();


        return redirect()->route('posts.index');
    }
}
