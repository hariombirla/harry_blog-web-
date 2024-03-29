<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = DB::table('categories')->get();
        $blog = Blog::with('comments.users')->get();
        return view('web/index', compact('category','blog'));
    }

    public function storeComment(Request $request){
        // dd($request->all());
        Comment::create($request->all());
        return ['success' => true];
        // dd($request->all());
    }
}
