<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Events\PostCreatedEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // try {
            $posts = Post::ordeerBy('id', 'desc')->paginate(10);
            // $posts = Post::where('user_id',auth()->id())->orderBy('id', 'desc')->paginate(10);
            return view('posts.index', ["posts" => $posts]);
        // } catch (\Throwable $th) {
        //    Log::channel("payment")->error($th->getMessage() . $th->getFile() . $th->getLine());
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if(Gate::allows('create-post')){
        // return view('posts.create');
        // }
        // abort(403);
        // $this->authorize("create" , Post::class);
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // file_name - upload image in storage - save to var
            $fileName = time() . "_" . $image->getClientOriginalName();
            $url = Storage::disk("public")->putFileAs("posts", $image, $fileName);
            $data['image'] = $url;
        }


        $data['user_id'] = Auth::id();
        $post = Post::create($data);
        event(new PostCreatedEvent($post));
        return to_route("posts.index")->with("success", "Post Created Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->authorize("view", $post);
        return view('posts.show', ['post' => $post]);
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
        // if (Gate::allows("delete-post", $post)) {
        //     $post->delete();
        //     // Post::destroy([100,99,98]);
        //     return to_route("posts.index")->with("success", "Post Deleted Successfully!");
        // }
        // abort(403);
        $this->authorize("delete-post", $post);
        if ($post->image && Storage::exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return to_route("posts.index")->with("success", "Post Deleted Successfully!");
    }
}
