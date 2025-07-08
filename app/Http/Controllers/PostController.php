<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.index', ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        dd("store");
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // file_name - upload image in storage - save to var
            $fileName = time() . "_" . $image->getClientOriginalName();
            $url = Storage::disk("public")->putFileAs("posts", $image, $fileName);
            $data['image'] = $url;
        }
        
        
        $data['user_id'] = Auth::id();
        Post::create($data);

        return to_route("posts.index")->with("success" , "Post Created Successfully!");
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        // Post::destroy([100,99,98]);
        return to_route("posts.index")->with("success" , "Post Deleted Successfully!");
    }
}
