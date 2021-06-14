<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /* 
        Retrieve the list => select all item in table article
    */
    public function index()
    {
        return Article::all();
    }

    /* 
        Retrieve a single one => select item in table article by id
    */
    public function show(Article $id)
    {
        /* Article $id correnspond to the article-class property */
        return $id;

        /* 
        old: (In this case, the argument is not article $id, but $id)
            return Article::find($id);
        */
    }

    /* 
        Insert new item in table article
    */
    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    /* 
        Update one item in table article
    */
    public function update(Request $request, Article $id)
    {
        $id->update($request->all());

        return response()->json($id, 200);

        /* 
        old: (In this case, the argument is not article $id, but $id)
            $article = Article::findOrFail($id);
            $artile->update($request->all());
            return $article;
        */
    }

    /* 
        Delete one item in table article by id
    */
    public function delete(Request $request, Article $id)
    {
        $id->delete();

        return response()->json(null, 204);
    }
}
