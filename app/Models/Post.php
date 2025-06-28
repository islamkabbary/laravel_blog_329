<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $table = "blogs";
    // protected $fillable = ['title' , "content"];
    // protected $guarded = ["id"];


    protected $casts = [
        // "is_published" => "boolean",
        "created_at" => "datetime",
    ];
}
