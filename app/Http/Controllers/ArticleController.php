<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=> 'required|integer|gt:0|min:1|not_in:0|exists:users,id',
            'title'=> 'required|max:255',
            'content'=> 'required|max:255',
            'is_publish'=> 'boolean'
        ]);

        $article = new Article([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'is_publish' => $request->get('is_publish') ? true : false,
        ]);

        $article->save();

        return redirect('/articles')->with('success', 'Article crated successful!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'=> 'required|integer|gt:0|min:1|not_in:0|exists:users,id',
            'title'=> 'required|max:255',
            'content'=> 'required|max:255',
            'is_publish'=> 'boolean'
        ]);

        $article = Article::find($id);
        $article->user_id = $request->get('user_id');
        $article->title = $request->get('title');
        $article->content = $request->get('content');
        $article->is_publish = $request->get('is_publish') ? true : false;
        $article->save();

        return redirect('/articles')->with('success', 'Article updated successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('success', 'Article deleted!');
    }
}
