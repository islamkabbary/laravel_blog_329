<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $posts = [
            ["title" => "first title", "subtitle" => "first subtitle"],
            ["title" => "second title", "subtitle" => "second subtitle"],
            ["title" => "second title", "subtitle" => "second subtitle"],
            ["title" => "second title", "subtitle" => "second subtitle"],
            ["title" => "second title", "subtitle" => "second subtitle"],
            ["title" => "second title", "subtitle" => "second subtitle"],
            ["title" => "second title", "subtitle" => "second subtitle"],
            ["title" => "second title", "subtitle" => "second subtitle"],
            ["title" => "second title", "subtitle" => "second subtitle"],
            ["title" => "second title", "subtitle" => "second subtitle"]
        ];
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
