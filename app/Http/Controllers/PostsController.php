<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    // ユーザが見る目次画面 別で管理者画面(manage)が必要(indexを丸写しでいい)
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index')->with('posts', $posts);
    }

    public function manageIndex()    //管理者用のトップページ
    {
        $posts = Post::latest()->get();
        return view('posts.manage')->with('posts', $posts);
    }

    
    public function show(Post $post)
    {
        // $post = Post::find($id);
        // $post = Post::findOrFail($id);
        return view('posts.show')->with('post', $post);
    }

    public function manageShow(Post $post)
    {
        return view('posts.manage_show')->with('post', $post);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/manage');
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/manage');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/manage');
    }

    public function increaseGood(Post $post)
    {
        // $post->good = $post->good + 1;
        // $post->good->save();

        // DB::table('users')->increment('votes');
        // DB::table('posts')->increment('good');
        // $post->where('id', 1)->increment('good');
        $post->increment('good');

        return redirect('/');
    }
}
