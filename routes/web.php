<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
// ORM (Object relational Mapping)
SELECT * FROM posts WHERE id = 1;
Post::find(1);
// Eloquent
// Query Builder
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [PageController::class, 'home']);
Route::get("/about-us", [PageController::class, 'about']);
Route::get("/contact-us", [PageController::class, 'contact']);
Route::post("/contact-us", [PageController::class, 'create_new_contect'])->name('create_new_contect');



Route::get("/blog/{id}", [PageController::class, 'showBlog']);

// Route::view("/", "home");
// Route::view("/about-us", "about");

Route::get("/profile", function () {
    // $user = User::create([
    //     "name" => "islam",
    //     "email" => "islam2@gmail.com",
    //     "password" => Hash::make(123456),
    // ]);
    // $user = User::find(4);
    // $user->profile()->create([
    //     "phone" => "0123456789",
    //     "address" => "test",
    // ]);
    
    // $user = User::find(4);
    // dd($user->profile);
    
    // $profile = Profile::find(3);
    // dd($profile->user);
});

// Route::get("/posts", function () {
//     // $user = User::create([
//     //     "name" => "islam",
//     //     "email" => "islam1@gmail.com",
//     //     "password" => Hash::make(123456),
//     // ]);

//     // $user->posts()->createMany([
//     //     ["title" => "1 title" , "content" => "1 content"],
//     //     ["title" => "2 title" , "content" => "2 content"],
//     //     ["title" => "3 title" , "content" => "3 content"],
//     // ]);

//     // $post = new Post;
//     // $post->title = "title";
//     // $post->content = "content";
//     // $post->user_id = 1;
//     // $post->save();
    
//     $user = User::find(1);
//     // dd($user->posts);

//     foreach($user->posts as $post){
//         echo $post->user->name . "<br>";
//     }
// });

// Route::get("/posts", function () {
//     // create
//     // $post = new Post();
//     // $post->title = "first title ".time();
//     // $post->content = "first content";
//     // $post->save();

//     // Read
//     // dd(Post::find(3)->is_published);
//     // return Post::findOrFail(1);
//     // return Post::all();

//     // update
//     // $post = Post::find(1);
//     // $post->title = "update First Title 1";
//     // $post->content = "update First content 1";
//     // $post->save();

//     // delete
//     // $post = Post::find(1);
//     // $post->delete();
// });

// Route::get("/posts", function () {
//     // // create
//     // Post::create([
//     //     "title" => "first title Mass Assi 1",
//     //     "content" => "first content Mass Assi 1",
//     // ]);



//     // Query
//     // dd(Post::where('is_published',true)->get());
//     // dd(Post::where('is_published',false)->get());
//     // dd(Post::orderBy('created_at',"desc")->get());
//     // dd(Post::where('is_published',true)->where("created_at",">=",now()->subDays(7))->get());
//     // dd(Post::where('title',"like","%57%")->get());
//     // dd(Post::limit(5)->get());
//     // dd(Post::whereIn('id',[3,4,8])->get());
//     dd(Post::whereNotIn('id',[3,4,8])->first());
//     // dd(Post::first());
// });

// Route::get("/cats", function () {
//     // $categories = [
//     //     "html",
//     //     "css",
//     //     "js",
//     //     "php",
//     //     "mysql",
//     //     "laravel",
//     // ];

//     // foreach($categories as $cat){
//     //     Category::create(['name' => $cat]);
//     // }


//     $post = Post::find(2);
//     // $post->categories()->detach([1,2]);

//     // $cat = Category::find(5);
//     // $cat->posts()->attach([2,3,4]);
// });

Route::get("/test", function () {
    Post::factory(100)->create();
    // $posts = DB::table('posts')->get();
    // $posts = DB::table('posts')->where('id',2)->first();
    // $posts = DB::table('posts')->insert([
        //     'title' => 'new post query builder',
        //     'content' => 'new post query builder',
        //     'user_id' => 1,
        // ]);
    // $posts = DB::table('posts')->where('id',2)->update(['title' => 'update post query builder']);
    // $posts = DB::table('posts')->where('id',22)->delete();
    // dd($posts);
});

// Route::post("/hello-post", function () {
//     return "hello Laravel";
// });

// Route::get('/product/{id}', function ($id) {
//     return "product " . $id;
// })->where(['id' => '[0-9]+']);

// Route::get('/product/{category}/{id}', function ($category, $id) {
//     return "product id => " . $id . " category => " . $category;
// })->where(['id' => '[0-9]+', 'category' => '[a-z]+']);

// Route::get('/user/{name?}', function ($name = "Guest") {
//     return "user_name =>  " . $name;
// })->name('user_name');

// -----------------------------------------------------------------

// Route::get('home',function(){
//     return view("home");
// });

// Route::get('home', function () {
//     $name = "mostafa";
//     return view("home", compact('name'));
// });

// Route::get('home', function () {
//     $name = "mostafa";
//     return view("home")->with('user_name', $name);
// });

// Route::get('home', function () {
//     $name = "mostafa";
//     return view("home", ['user_name' => $name]);
// });


// Route::get('home', function () {
//     $name = "mostafa";
//     $age = 26;
//     $city = "Alex";
//     return view("home", compact('name', 'age', 'city'));
// });

// Route::get('home', function () {
//     $name = "mostafa";
//     $age = 26;
//     $city = "Alex";
//     return view("home")->with('name', $name)->with('age', $age)->with('city', $city);
// });

// Route::get('home', function () {
//     $name = "mostafa";
//     $age = 26;
//     $city = "Alex";
//     return view("home", ['name'=> $name, 'age'=> $age, 'city'=> $city]);
// });

// Route::get('home', function () {
//     $name = "mostafa";
//     $age = 26;
//     $job = "PHP Developer";
//     $skills = ['html','css','php','laravel'];
//     return view("home")->with(['name'=> $name, 'age'=> $age, 'job'=> $job , 'skills' => $skills]);
// });

// Route::get('home', function () {
//     $name = "mostafa";
//     $age = 26;
//     $job = "PHP Developer";
//     $skills = ['html','css','php','laravel'];
//     return view("home", ['name'=> $name, 'age'=> $age, 'job'=> $job , 'skills' => $skills]);
// });