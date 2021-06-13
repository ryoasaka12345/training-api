<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* 
    The controller will be started by route.
*/
class HelloWorldController extends Controller
{
    public function index() {
        return response()->json(['data' => ['message'=>'Hello World API']], 200);
    }

    public function index2() {
        return response()->json(['data' => ['name'=>'Ryo Asaka']], 200);
    }
}
