<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


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

// Route::get("/", [PageController::class, 'home']);
Route::get("/about-us", [PageController::class, 'about']);
Route::get("/contact-us", [PageController::class, 'contact']);
Route::post("/contact-us", [PageController::class, 'create_new_contect'])->name('create_new_contect');



Route::get("/blog/{id}", [PageController::class, 'showBlog']);

// Route::view("/", "home");
// Route::view("/about-us", "about");

Route::get("/posts", function () {
    // create
    // $post = new Post();
    // $post->title = "first title ".time();
    // $post->content = "first content";
    // $post->save();

    // Read
    // dd(Post::find(3)->is_published);
    // return Post::findOrFail(1);
    // return Post::all();

    // update
    // $post = Post::find(1);
    // $post->title = "update First Title 1";
    // $post->content = "update First content 1";
    // $post->save();

    // delete
    // $post = Post::find(1);
    // $post->delete();
});

Route::get("/posts", function () {
    // // create
    // Post::create([
    //     "title" => "first title Mass Assi 1",
    //     "content" => "first content Mass Assi 1",
    // ]);



    // Query
    // dd(Post::where('is_published',true)->get());
    // dd(Post::where('is_published',false)->get());
    // dd(Post::orderBy('created_at',"desc")->get());
    // dd(Post::where('is_published',true)->where("created_at",">=",now()->subDays(7))->get());
    // dd(Post::where('title',"like","%57%")->get());
    // dd(Post::limit(5)->get());
    // dd(Post::whereIn('id',[3,4,8])->get());
    dd(Post::whereNotIn('id',[3,4,8])->first());
    // dd(Post::first());
});

// Route::get("/hello", function () {
//     return "hello Laravel";
// });

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