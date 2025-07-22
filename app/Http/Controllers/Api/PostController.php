<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Events\PostCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
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
        return ApiResponse::success(["posts" => PostResource::collection(Post::all())],"Posts Fetched successfuly",200);
        // return ApiResponse::success(["posts" =>Post::all()],"Posts Fetched successfuly",200);
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


        $data['user_id'] = 1;
        $post = Post::create($data);
        return ApiResponse::success(["post" => $post],"Post Created successfuly",201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        try {
            return ApiResponse::success(["post" => new PostResource($post)],"Post Show successfuly",200);
        } catch (\Throwable $th) {
            return ApiResponse::error("error",$th->getMessage(),200);
        }
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
    public function destroy(string $id)
    {
        //
    }
}
