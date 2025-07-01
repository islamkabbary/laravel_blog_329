<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    
    public function posts()
    {
        return $this->belongsToMany(Post::class, "category_post");
        // return $this->belongsToMany(Category::class,CategoryPost::class);
    }
}
