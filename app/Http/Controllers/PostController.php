<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * トップ画面表示のファンクション
     * 'posts.index'でposts/index.blade.phpをviewとして呼び出す指定
     * Post::all()で作成されている投稿をすべて取得しています
     */
     
    public function index()
    {
        $posts = Post::all();
        
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * createが要求されたらposts.createのviewを引き渡す
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * store では/postsへPOSTリクエストで送信されたパラメータを受け取っている。
     * 受け取ったパラメータは$requestに保存される。
     * $request->input('title')でパラメータを引き出せる。
     * $post = new Post();で新しいPOSTを作成している。
     * $requestに保存されているパラメータを
     * title,contentのように{{Postモデルのカラムごと}}に受け取ります。
     * $saveで保存して/posts/:id というURLへリダイレクトする。
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id])->with('message', 'Post was successfully created.');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     * 'posts.show'でposts/show.blade.phpをviewとして呼び出す指定
     * 引数$postは/posts/:idから
     * 自動的に該当する投稿データを取得しています。
     * compact('post')でビューに変数を渡すことができます。
     */
    public function show(Post $post)
    {
         return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id])->with('message', 'Post was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()->route('posts.index');
        
    }
}
