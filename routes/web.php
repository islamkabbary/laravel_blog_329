<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("/hello", function () {
    return "hello Laravel";
});

// Route::post("/hello-post", function () {
//     return "hello Laravel";
// });

Route::get('/product/{id}', function ($id) {
    return "product " . $id;
})->where(['id' => '[0-9]+']);

Route::get('/product/{category}/{id}', function ($category, $id) {
    return "product id => " . $id . " category => " . $category;
})->where(['id' => '[0-9]+', 'category' => '[a-z]+']);

Route::get('/user/{name?}', function ($name = "Guest") {
    return "user_name =>  " . $name;
})->name('user_name');

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

Route::get('home', function () {
    $name = "mostafa";
    $age = 26;
    $job = "PHP Developer";
    $skills = ['html','css','php','laravel'];
    return view("home", ['name'=> $name, 'age'=> $age, 'job'=> $job , 'skills' => $skills]);
});
