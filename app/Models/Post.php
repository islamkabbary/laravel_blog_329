<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $table = "blogs";
    protected $fillable = ['title' , "content" , "user_id" , "image"];
    // protected $guarded = ["id"];


    protected $casts = [
        // "is_published" => "boolean",
        "created_at" => "datetime",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,"category_post");
        // return $this->belongsToMany(Category::class,CategoryPost::class);
    }
}
