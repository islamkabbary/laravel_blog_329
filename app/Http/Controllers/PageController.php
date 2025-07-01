<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $posts = Post::paginate(5);
        return view("home", ['posts' => $posts]);
    }
    public function about()
    {
        return view("about");
    }
    public function contact()
    {
        return view("contact");
    }
    public function create_new_contect(Request $request)
    {
        dd($request->all());
    }
    public function showBlog($id)
    {
        return view("about");
    }
}
