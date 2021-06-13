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
    public function show($id)
    {
        return Article::find($id);
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
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }
}
