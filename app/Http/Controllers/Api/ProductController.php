<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    /* 
        select all data
    */
    public function index()
    {
        return Products::all();
    }

    /* 
        select a data
    */
    public function show(Products $id)
    {
        return $id;
    }

    /* 
        delete a data
    */
    public function delete(Products $id)
    {
        $id->delete();
        return response()->json(null, 204);
    }

    /* 
        insert new item in table article
    */
    public function store(Request $request)
    {
        return Products::create($request->all());
    }

    /* 
        update a product information
    */
    public function update(Request $request, Products $id)
    {
        $id->update($request->all());
        return response()->json($id, 200);
    }
}
